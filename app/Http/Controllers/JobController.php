<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    { // $job = Job::find($id);

        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    { // request()->all();
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job = Job::create(([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]));

        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );
        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        // Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        Gate::authorize('edit-job', $job);

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        // authorise

        // update the job
        // $job = Job::findOrFail($id);

        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        Gate::authorize('edit-job', $job);

        // $job = Job::findOrFail($id);
        $job->delete();

        return redirect('/jobs');
    }
}
