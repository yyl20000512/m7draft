<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextEntryController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobSeekerProfileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['jobseeker'])->group(function () {
    // Job seeker-specific routes
});

Route::middleware(['employer'])->group(function () {
    // Employer-specific routes
});

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::resource('job_seeker_profiles', JobSeekerProfileController::class)->only(['store', 'update']);
// });

// Route::post('/text-entry', [TextEntryController::class, 'store']);
// Route::get('/text-entry/latest', [TextEntryController::class, 'latest']);

Route::get('/job_seeker_profiles/{user_id}', [JobSeekerProfileController::class, 'show']);
Route::post('/job_seeker_profiles', [JobSeekerProfileController::class, 'store']);
Route::put('/job_seeker_profiles/{id}', [JobSeekerProfileController::class, 'update']);

Route::apiResource('text-entry', TextEntryController::class);
Route::apiResource('job_seekers', JobSeekerController::class);
Route::apiResource('employers', EmployerController::class);
Route::apiResource('jobs', JobController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('job_seeker_profiles', JobSeekerProfileController::class);

