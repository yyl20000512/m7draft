<?php

namespace App\Http\Controllers;

use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class JobSeekerController extends Controller
{
    public function index()
    {
        $jobSeekers = JobSeeker::all();
        return response()->json($jobSeekers);
    }

    public function create()
    {
        return view('job_seekers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'profile' => 'required',
            'job_search_status' => 'required',
        ]);
    
        $jobSeeker = new JobSeeker([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'profile' => $request->input('profile'),
            'job_search_status' => $request->input('job_search_status'),
        ]);
    
        $jobSeeker->save();
    
        return response()->json('Job Seeker created!');
    }

    public function edit($id)
    {
        return view('job_seekers.edit', ['id' => $id]);
    }

    public function show($id)
    {
        $jobSeeker = JobSeeker::findOrFail($id);
        return response()->json($jobSeeker);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'profile' => 'required',
            'job_search_status' => 'required',
        ]);

        $jobSeeker = JobSeeker::findOrFail($id);
        $jobSeeker->name = $request->input('name');
        $jobSeeker->email = $request->input('email');
        $jobSeeker->password = bcrypt($request->input('password'));
        $jobSeeker->profile = $request->input('profile');
        $jobSeeker->job_search_status = $request->input('job_search_status');

        $jobSeeker->save();

        return response()->json('Job Seeker updated!');
    }

    public function destroy(JobSeeker $job_seeker)
    {
        $job_seeker->delete();
        return redirect()->route('job_seekers.index')->with('success', 'Job seeker deleted successfully');
    }
}