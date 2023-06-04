<h1>Create Course</h1>

<form action="{{ route('courses.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <!-- Add other input fields for course creation -->

    <button type="submit" class="btn btn-primary">Create</button>
</form>
