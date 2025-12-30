<x-layout>
<div class="max-w-3xl mx-auto mt-12 px-4">

    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Edit Job' => '#']" class="mb-6" />

    <x-card class="p-8 shadow-lg border border-gray-200 rounded-xl">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Job</h1>

        <form action="{{ route('my-jobs.update', $job) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" :value="$job->title" placeholder="Enter job title"
                        class="mt-2 w-full border rounded-md p-3 focus:ring-2 focus:ring-indigo-400" />
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" :value="$job->location" placeholder="Enter location"
                        class="mt-2 w-full border rounded-md p-3 focus:ring-2 focus:ring-indigo-400" />
                </div>
                <div class="col-span-1 md:col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary" placeholder="Enter salary"
                        class="mt-2 w-full border rounded-md p-3 focus:ring-2 focus:ring-indigo-400" />
                </div>
                <div class="col-span-1 md:col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <textarea name="description" rows="5" placeholder="Job description..."
                        class="mt-2 w-full border rounded-md p-3 focus:ring-2 focus:ring-indigo-400">{{ $job->description }}</textarea>
                </div>
                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <div class="flex flex-wrap gap-3 mt-2">
                        @foreach(\App\Models\Job::$experience as $exp)
                            <label class="cursor-pointer px-4 py-2 border rounded-full
                                {{ $job->experience === $exp ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white text-gray-700' }}
                                hover:bg-indigo-500 hover:text-white transition">
                                <input type="radio" name="experience" value="{{ $exp }}" class="hidden"
                                    {{ $job->experience === $exp ? 'checked' : '' }} />
                                {{ ucfirst($exp) }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <div class="flex flex-wrap gap-3 mt-2">
                        @foreach(\App\Models\Job::$category as $cat)
                            <label class="cursor-pointer px-4 py-2 border rounded-full
                                {{ $job->category === $cat ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white text-gray-700' }}
                                hover:bg-indigo-500 hover:text-white transition">
                                <input type="radio" name="category" value="{{ $cat }}" class="hidden"
                                    {{ $job->category === $cat ? 'checked' : '' }} />
                                {{ ucfirst($cat) }}
                            </label>
                        @endforeach
                    </div>
                </div>

            </div>

           
            <div class="mt-6">
                <x-button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-md transition">
                    Update Job
                </x-button>
            </div>
        </form>
    </x-card>
</div>
</x-layout>
