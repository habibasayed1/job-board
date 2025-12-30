<x-layout>
<div class="max-w-2xl mx-auto mt-10">

    <x-breadcrumbs class="mb-4" 
        :links="[
            'jobs' => route('jobs.index'),
            $job->title => route('jobs.show',$job),
            'Apply'=>'#',
        ]" />
        <x-job-card :job="$job"/>

    
    <x-card>
    <h2 class="mb-5 text-lg font-semibold text-slate-800 border-b pb-2">
           Your Job Application
        </h2>
   
      
      <form action="{{ route('job.applications.store', $job)}}" method="POST"
      enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <x-label for="expected_salary" :required="true">Expected Salary</x-label>
        <x-text-input type="number" name="expected_salary" />
        <div class="mb-4">
    <x-label for="experience" >
        Job Experience (Description)
    </x-label>
    <textarea name="experience" rows="4" class="w-full border rounded p-2" placeholder="Describe your experience">{{ old('experience') }}</textarea>
</div>

<div class="mb-4">
    <x-label for="experience_years">
        Job Experience Years
    </x-label>
    <input type="number" name="experience_years" min="0" max="50" class="w-full border rounded p-2" value="{{ old('experience_years') }}" />
</div>
        <div class="mb-4">
            <x-label :required="true">Upload Cv</x-label>
            <x-text-input type="file" name="cv" />

        </div>

      </div>
      <x-button class="w-full">Apply</x-button>

    </form>

</x-card>
        </div>
</x-layout>
