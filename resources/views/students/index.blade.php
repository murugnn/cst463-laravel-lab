 @extends('layouts.app')

@section('title', 'Student List')

@section('content')
    <h1>Student List</h1>

    @if (session('status'))
        <div id="status" role="status">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('students.create') }}">Add Student</a>

    @foreach ($students as $student)
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