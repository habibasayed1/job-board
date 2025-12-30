<x-layout>
    {{-- Hero Section --}}
    <section class="bg-indigo-50 py-16">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-indigo-700 mb-4">
                Discover Your Next Career Move
            </h1>
            <p class="text-lg text-slate-600 mb-6">
                Explore thousands of opportunities and find the perfect job for you.
            </p>

            {{-- Search Form --}}
            <form action="{{ route('jobs.index') }}" method="GET" class="flex flex-col sm:flex-row gap-2 justify-center">
                <x-text-input name="search" value="{{ request('search') }}" placeholder="Search jobs (e.g. Frontend Developer)" class="w-full sm:w-2/3"/>
                <x-button type="submit" class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-slate-600 font-medium px-6 py-2 rounded-md transition">
                    Search
                </x-button>
            </form>
        </div>
    </section>

    <div class="max-w-7xl mx-auto mt-8 px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Filters --}}
        <div class="lg:col-span-1">
            <x-card class="p-6 bg-white shadow-md rounded-lg">
                <form x-ref="filters" id="filtering-form" action="{{route('jobs.index')}}" method="GET" class="space-y-6">
                    {{-- Salary --}}
                    <div>
                        <label class="block font-semibold mb-2">Salary</label>
                        <div class="flex gap-2">
                            <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" class="w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"/>
                            <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" class="w-full border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"/>
                        </div>
                    </div>
                    

                    {{-- Category --}}
                    <div>
                    <div> 
                        <div class="mb-1 font-semibold">Category

                        </div> 
                        <x-radio-group name="category" :options="App\Models\Job::$category"/> 
                         </div> 
                        <div class="flex flex-wrap gap-2">
                        <div> 
                            <div class="mb-1 font-semibold">Experience </div>
                             <x-radio-group name="experience" :options="array_combine(array_map('ucfirst' , App\Models\Job::$experience) , App\Models\Job::$experience)"/> 
                            </div>
                        </div>
                    </div>

                    <x-button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-slate-600 font-medium py-2 rounded-md transition">
                        Filter
                    </x-button>
                </form>
            </x-card>
        </div>

        {{-- Job Cards --}}
        <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($jobs as $job)
                <x-job-Card class="hover:shadow-lg transition-shadow" :job="$job">
                    <div class="mt-3">
                        <x-linkbutton :href="route('jobs.show',$job)" class="w-full block text-center bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-md transition">
                            More
                        </x-linkbutton>
                    </div>
                </x-job-Card>
            @endforeach
        </div>

    </div>
</x-layout>
