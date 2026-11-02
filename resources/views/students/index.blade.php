
@extends('layouts.app')

@section('content')
    <h1>Student List</h1>

    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <a href="{{ route('students.create') }}">Add Student</a>

    @foreach($students as $student)
        <div>
            <p>
                <a href="{{ route('students.show', $student) }}">
                    {{ $student->name }}
                </a>
                | Roll: {{ $student->roll_no }}
                | Email: {{ $student->email }}
                | Department: {{ $student->department }}
                | Semester: {{ $student->semester }}
                | CGPA: {{ $student->cgpa }}
            </p>
        </div>
    @endforeach
@endsection
