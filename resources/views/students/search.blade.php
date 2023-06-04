<!-- students/search.blade.php -->

<h1>Search Results</h1>

<form action="{{ route('students.search') }}" method="GET">
    <label for="search_query">Search:</label>
    <input type="text" name="search_query" id="search_query" value="{{ old('search_query') }}" required>
    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Group</th>
            <th>Course</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->group->name }}</td>
            <td>{{ $student->course->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
