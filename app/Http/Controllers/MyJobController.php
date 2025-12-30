<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    public function index()
    {
        abort_if(!auth()->user()->employer, 403);

        $jobs = auth()->user()->employer
            ->jobs()
            ->with(['jobApplications.user'])
            ->get();

        return view('my-jobs.index', compact('jobs'));
    }

    public function create()
    {
        abort_if(!auth()->user()->employer, 403);

        $categories = Job::$category;
        $experiences = Job::$experience;

        return view('my-jobs.create', compact('categories', 'experiences'));
    }

    public function store(JobRequest $request)
    {
        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully.');
    }

    public function show(Job $myJob)
{
    return view('my-jobs.show', ['job' => $myJob]);
}

public function edit(Job $myJob)
{
    abort_if(auth()->id() !== $myJob->employer->user_id, 403);

    $categories = Job::$category;
    $experiences = Job::$experience;

    return view('my-jobs.edit', [
        'job' => $myJob,
        'categories' => $categories,
        'experiences' => $experiences
    ]);
}
    public function update(JobRequest $request, Job $myJob)
    {
        abort_if(auth()->id() !== $myJob->employer->user_id, 403);

        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $myJob)
    {
        abort_if(auth()->id() !== $myJob->employer->user_id, 403);

        $myJob->delete();

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job deleted.');
    }
}

