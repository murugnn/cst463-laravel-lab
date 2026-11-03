@extends('layouts.app')

@section('title', 'Add student')

@section('content')
    <h1>Add a student</h1>

    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        @include('students._fields')
        <button type="submit">Save</button>
    </form>
@endsection