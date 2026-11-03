<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ROUTES  — the front door of a Laravel app
|--------------------------------------------------------------------------
| Every request (URL + HTTP verb) is matched against this list.
| The first route that matches decides who handles it:
|   - a closure (small function written right here), or
|   - a controller method   [SomeController::class, 'method']
|
| See every route:   php artisan route:list
*/

// Lesson 1: the home page. A closure that returns a view (resources/views/home.blade.php).
Route::get('/', function () {
    return view('home');
});

// Lessons 2-6: you will add your routes below this line.

// A. Route parameter -> view
Route::get('/hello/{name}', function (string $name) {
    return "Hello, " . $name;
})->name('hello');

// A. Controller method (not a closure)
Route::get('/about', [PageController::class, 'about'])->name('about');

// B. Resource controller (index, create, store, show, edit, update, destroy)
Route::resource('students', StudentController::class);

// C. Explicit binding: {roll} is resolved in AppServiceProvider::boot() by roll_no
Route::get('/roll/{roll}', function (Student $roll) {
    return view('students.show', ['student' => $roll]);
})->name('students.byRoll');

Route::get('/api/students', function () {
    return response()->json(
        Student::query()->get()->toArray()
    );
});