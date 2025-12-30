<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\MyJobController;
use App\Http\Middleware\Employer;

Route::get('/', fn() => to_route('jobs.index'));

Route::resource('jobs', JobController::class)->only(['index']);
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['create','store']);
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::middleware('auth')->group(function () {

    // Job Applications (for users applying to jobs)
    Route::resource('job.applications', JobApplicationController::class)
        ->only(['create', 'store']);

    // My Job Applications (employer viewing applicants)
    Route::resource('my-job-applications', MyJobApplicationController::class)
        ->only(['index', 'destroy']);

    // Employer registration
    Route::resource('employer', EmployerController::class)
        ->only(['create', 'store']);

    // My Jobs (for employers)
    Route::middleware(Employer::class)->group(function () {
        Route::resource('my-jobs', MyJobController::class)
            ->only(['index','create','store','show','edit','update','destroy']);
    });
});
