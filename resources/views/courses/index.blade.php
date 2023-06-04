<h1>Course List</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('courses.create') }}" class="btn btn-primary">Create Course</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
