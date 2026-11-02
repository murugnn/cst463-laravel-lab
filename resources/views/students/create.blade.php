
@extends('layouts.app')

@section('content')
    <h1>Create Student</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <p>
            <label>Roll Number</label>
            <input type="text" name="roll_no" required>
        </p>

        <p>
            <label>Name</label>
            <input type="text" name="name" required>
        </p>

        <p>
            <label>Email</label>
            <input type="email" name="email" required>
        </p>

        <p>
            <label>Department</label>
            <input type="text" name="department" value="CSE">
        </p>

        <p>
            <label>Semester</label>
            <input type="number" name="semester" value="7">
        </p>

        <p>
            <label>CGPA</label>
            <input type="number" name="cgpa"
                   step="0.01" min="0" max="10">
        </p>

        <button type="submit">Save Student</button>
    </form>
@endsection
