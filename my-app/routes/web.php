<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Job Seekers
Route::get('/job_seekers', function () {
    return view('job_seekers.index');
});
Route::get('/job_seekers/create', function () {
    return view('job_seekers.create');
});
Route::get('/job_seekers/{id}/edit', function ($id) {
    return view('job_seekers.edit', ['id' => $id]);
});
Route::get('/job_seekers/{id}', function ($id) {
    return view('job_seekers.show', ['id' => $id]);
});

// Employers
Route::get('/employers', function () {
    return view('employers.index');
});
Route::get('/employers/create', function () {
    return view('employers.create');
});
Route::get('/employers/{id}/edit', function ($id) {
    return view('employers.edit', ['id' => $id]);
});
Route::get('/employers/{id}', function ($id) {
    return view('employers.show', ['id' => $id]);
});

// Jobs
Route::get('/jobs', function () {
    return view('jobs.index');
});
Route::get('/jobs/create', function () {
    return view('jobs.create');
});
Route::get('/jobs/{id}/edit', function ($id) {
    return view('jobs.edit', ['id' => $id]);
});
Route::get('/jobs/{id}', function ($id) {
    return view('jobs.show', ['id' => $id]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\UserController::class, 'getUserData'])->name('home');
Route::get('/job_seeker_profiles/{id}', [App\Http\Controllers\JobSeekerProfileController::class, 'show'])->name('home');
Route::post('/job_seeker_profiles', [App\Http\Controllers\JobSeekerProfileController::class, 'store'])->name('home');
Route::put('/job_seeker_profiles/{id}', [App\Http\Controllers\JobSeekerProfileController::class, 'update'])->name('home');