<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class StudentController extends Controller
{
    // GET /students
    public function index(): View
    {
        $students = Student::orderBy('id')->get();

        return view('students.index', compact('students'));
    }

    // GET /students/create
    public function create(): View
    {
        return view('students.create');
    }

    // POST /students
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('status', 'Student saved successfully!');
    }

    // GET /students/{student}  — implicit route model binding (unknown id => 404)
    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    // GET /students/{student}/edit
    public function edit(Student $student): View
    {
        return view('students.edit', compact('student'));
    }

    // PUT/PATCH /students/{student}
    public function update(Request $request, Student $student): RedirectResponse
    {
        $student->update($request->validate($this->rules($student)));

        return redirect()->route('students.show', $student)->with('status', 'Student updated successfully!');
    }

    // DELETE /students/{student}
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()->route('students.index')->with('status', 'Student deleted successfully!');
    }

    private function rules(?Student $student = null): array
    {
        return [
            'roll_no'    => ['required', 'string', 'max:20', Rule::unique('students', 'roll_no')->ignore($student)],
            'reg_no'     => ['nullable', 'string', 'max:20', Rule::unique('students', 'reg_no')->ignore($student)],
            'name'       => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email', 'max:150', Rule::unique('students', 'email')->ignore($student)],
            'department' => ['required', 'string', 'max:50'],
            'semester'   => ['required', 'integer', 'between:1,8'],
            'cgpa'       => ['nullable', 'numeric', 'between:0,10'],
        ];
    }
}