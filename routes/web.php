<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('home');
});

// Part A: MVC and routes
Route::get('/hello/{your_name}', [PageController::class, 'hello']);
Route::get('/about', [PageController::class, 'about']);

// Part B: Resource controller
Route::resource('students', StudentController::class);

// Part C: Explicit route model binding
Route::get('/roll/{your_roll}', function (Student $your_roll) {
    return view('students.show', [
        'student' => $your_roll
    ]);
});

// Part E: JSON API
Route::get('/api/students', function () {
    return response()->json(Student::all());
});
