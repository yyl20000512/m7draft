<?php

namespace App\Http\Controllers;

use App\Models\JobSeekerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JobSeekerProfileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'personal_details' => ['nullable','string'],
            'job_search_status' => ['required','string'],
        ]);

        $profile = JobSeekerProfile::create($request->all());

        return response()->json($profile, 201);
    }

    public function update(Request $request, $profile_id)
    {
        Log::info('Inside update method'); // Add this line to log a message
        $profile = JobSeekerProfile::where('id', $profile_id)->first();

        if (!$profile) {
            return response()->json(['error' => 'Profile not found'], 404);
        }

        $request->validate([
            'personal_details' => ['nullable','string'],
            'job_search_status' => ['required','string'],
        ]);

        $profile->update($request->all());

        return response()->json($profile, 200);
    }

    public function show(Request $request, $user_id)
    {
        $profile = JobSeekerProfile::where('user_id', $user_id)->first();
        
        if ($profile) {
            $id = $profile->id;
            $personal_details = $profile->personal_details;
            $job_search_status = $profile-> job_search_status;

            return response()->json([
                'id' => $id,
                'personal_details' => $personal_details,
                'job_search_status' => $job_search_status,
            ]);
        } else {
            return response()->json(null, 404);
        }
    }
}
