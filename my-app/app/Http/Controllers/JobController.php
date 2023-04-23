<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        // return view('jobs.index', compact('jobs'));
        return response()->json($jobs);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:job_seekers',
            'password' => 'required|min:8',
            'job_search_status' => 'required|in:active,inactive',
        ]);

        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);

        $jobSeeker = JobSeeker::create($requestData);
        return response()->json($jobSeeker, 201);
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'requirements' => 'required',
            'employer_id' => 'required',
            'status' => 'required',
        ]);

        $job->update($request->all());
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully');
    }
}