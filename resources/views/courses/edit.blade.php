<h1>Edit Course</h1>

<form action="{{ route('courses.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $course->name }}" required>

    <!-- Add other input fields for course update -->

    <button type="submit" class="btn btn-primary">Update</button>
</form>
