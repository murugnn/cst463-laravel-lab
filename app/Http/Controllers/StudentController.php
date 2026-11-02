<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'roll_no' => 'required|string|max:255|unique:students,roll_no',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students,email',
            'department' => 'nullable|string|max:255',
            'semester' => 'nullable|integer|min:1|max:255',
            'cgpa' => 'nullable|numeric|min:0|max:10',
        ]);

        $student = Student::create($validated);

        return redirect()
            ->route('students.show', $student)
            ->with('status', 'Student saved successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}
