<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);

// Route::controller(JobController::class)->group(function () {
// Index
// Route::get('/jobs', 'index');

// Create
// Route::get('/jobs/create', 'create');

// Show
// Route::get('/jobs/{job}', 'show');

// Store
// Route::post('/jobs', 'store');

// Edit
// Route::get('/jobs/{job}/edit', 'edit');

// Update
// Route::patch('/jobs/{job}', 'update');

// Destroy
// Route::delete('/jobs/{job}', 'destroy');
// });
