@if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="roll_no">Roll No</label>
<input id="roll_no" name="roll_no" value="{{ old('roll_no', $student->roll_no ?? '') }}" required>

<label for="reg_no">Reg No (optional)</label>
<input id="reg_no" name="reg_no" value="{{ old('reg_no', $student->reg_no ?? '') }}">

<label for="name">Name</label>
<input id="name" name="name" value="{{ old('name', $student->name ?? '') }}" required>

<label for="email">Email</label>
<input id="email" name="email" type="email" value="{{ old('email', $student->email ?? '') }}" required>

<label for="department">Department</label>
<input id="department" name="department" value="{{ old('department', $student->department ?? 'CSE') }}" required>

<label for="semester">Semester</label>
<input id="semester" name="semester" type="number" min="1" max="8" value="{{ old('semester', $student->semester ?? 7) }}" required>

<label for="cgpa">CGPA (optional)</label>
<input id="cgpa" name="cgpa" type="number" step="0.01" min="0" max="10" value="{{ old('cgpa', $student->cgpa ?? '') }}">