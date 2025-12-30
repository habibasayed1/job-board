<x-layout>
<div class="max-w-4xl mx-auto mt-12 px-4">

    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index')]" class="mb-6" />

    <div class="flex justify-end mb-6">
        <a href="{{ route('my-jobs.create') }}"
           class="inline-block px-5 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition font-semibold">
            Add New Job
        </a>
    </div>

    @forelse ($jobs as $job)
        <x-card class="mb-6 p-6 shadow-md border border-gray-200 rounded-xl">

            <div class="flex justify-between items-start mb-4">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $job->title }}</h2>
                    <p class="text-sm text-gray-500">{{ $job->location }} | ${{ number_format($job->salary) }}</p>
                </div>
                <span class="text-sm text-gray-400">{{ $job->created_at->diffForHumans() }}</span>
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <a href="{{ route('my-jobs.show', $job) }}"
                   class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 transition font-semibold">
                    More
                </a>

                @if(auth()->id() === $job->employer->user_id)
                    <a href="{{ route('my-jobs.edit', $job) }}"
                       class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 transition font-semibold">
                        Edit
                    </a>

                    <form action="{{ route('my-jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-semibold">
                            Delete
                        </button>
                    </form>
                @endif
            </div>

        </x-card>
    @empty
        <div class="rounded-lg border-2 border-dashed border-gray-300 p-12 text-center">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">No jobs yet</h2>
            <p class="text-gray-500 mb-4">Post your first job to start receiving applications.</p>
            <a href="{{ route('my-jobs.create') }}"
               class="inline-block px-5 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                Post Your First Job
            </a>
        </div>
    @endforelse
</div>
</x-layout>
