<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;

// Loaded by bootstrap/app.php with the "/api" prefix.
// GET /api/students -> JSON array of every student
Route::get('/students', function () {
    return response()->json(Student::all());
})->name('api.students.index');