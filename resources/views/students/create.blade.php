<!-- students/create.blade.php -->

<h1>Create Student</h1>

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="group_id">Group:</label>
    <select name="group_id" id="group_id" required>
        @foreach($groups as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>

    <label for="course_id">Course:</label>
    <select name="course_id" id="course_id" required>
        @foreach($courses as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>

    <button type="submit">Create</button>
</form>
