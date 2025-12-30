<x-layout>
<div class="max-w-2xl mx-auto mt-10">
    <x-breadcrumbs class="mb-4" 
        :links="[
            'jobs' => route('jobs.index'),
            $job->title => '#'
        ]" 
    />
   
   
    <x-job-card :job="$job">
    <p class="text-l text-slate-700 mb-4">{!!nl2br(e($job->description))!!}</p>
    @auth
    <a href="{{ route('job.applications.create', $job) }}"
   class="inline-block mb-4 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
    Apply
</a>
    @else
    <p class="text-red-500 mb-4">
        Please <a href="{{ route('auth.create') }}" class="underline">login</a> to apply.
    </p>
    @endauth
    </x-job-card>
    <x-card class="mb-4 font-bold text-slate-600 shadow-slate-900 text-xl ">
        <h2 class="mb-5 text-lg font-semibold text-slate-800 border-b pb-2">
            More {{$job->employer->company_name}} Jobs
        </h2>
        <div class="text-sm text-slate-600">
            @foreach($job->employer->jobs as $otherjob)
            <div class="mb-4 flex justify-between items-center rounded-lg p-3 
                hover:bg-slate-200 transition font-serif">
                <div>
                <div class="text-slate-700">
                    <a href="{{route('jobs.show',$otherjob)}}">{{$otherjob->title}}</a>
                </div>
                <div class="text-xs">
                    {{$otherjob->created_at->diffForHumans()}}

                </div>
                </div> 
                <div class="text-xs">
                    ${{number_format($otherjob->salary)}}
                </div>

            </div>
            @endforeach

        </div>
    </x-card>
        </div>
</x-layout>
