
<!DOCTYPE html>
<html>
<head>
    <title>Laravel Student Lab</title>
</head>
<body>
    <nav>
        <a href="{{ route('students.index') }}">Students</a>
        |
        <a href="{{ route('students.create') }}">Add Student</a>
    </nav>

    <hr>

    @yield('content')
</body>
</html>
