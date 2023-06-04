<!-- students/edit.blade.php -->

<h1>Edit Student</h1>

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $student->name }}" required>

    <label for="group_id">Group:</label>
    <select name="group_id" id="group_id" required>
        @foreach($groups as $id => $name)
            <option value="{{ $id }}" {{ $id == $student->group_id ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
    </select>

    <label for="course_id">Course:</label>
    <select name="course_id" id="course_id" required>
        @foreach($courses as $id => $name)
            <option value="{{ $id }}" {{ $id == $student->course_id ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
    </select>

    <button type="submit">Update</button>
</form>
