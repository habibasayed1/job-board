<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function create(Job $job)
    {
        $this->authorize('apply', $job);

        return view('job_application.create', ['job' => $job]);
    }

    public function store(Request $request, Job $job)
{
    $this->authorize('apply', $job);

    $validated = $request->validate([
        'expected_salary'   => 'required|integer|min:1|max:1000000',
        'experience'        => 'required|string|min:10|max:2000',
        'experience_years'  => 'required|integer|min:0|max:50',
        'cv'                => 'required|file|mimes:pdf|max:2048',
    ]);

    $path = $request->file('cv')->store('cvs', 'public');

    $job->jobApplications()->create([
        'user_id'          => $request->user()->id,
        'expected_salary'  => $validated['expected_salary'],
        'experience'       => $validated['experience'],
        'experience_years' => $validated['experience_years'],
        'cv_path'          => $path,
    ]);

    return redirect()->route('jobs.show', $job)
                     ->with('success', 'Job application submitted successfully!');
}
}
