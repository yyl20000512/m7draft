<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ...

    public function getUserData(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            // Fetch the user's job seeker profile and check if they are a job seeker.
            // You need to adjust the relationship and field names according to your schema.
            $name = $user->name;
            $email = $user->email;
            $user_type = $user->user_type;
            $profile = $user->jobSeekerProfile;
            $isJobSeeker = $user->is_job_seeker;

            return response()->json([
                'user_id' => $user->id,
                'name' => $name,
                'email' => $email,
                'user_type' => $user_type,
                'profile' => $profile,
                'is_job_seeker' => $isJobSeeker,
            ]);
        }

        return response()->json(['message' => 'User not found'], 404);
    }
}