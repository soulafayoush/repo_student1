<h1>Students</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('students.create') }}" class="btn btn-primary">إضافة طالب</a>
<a href="{{ route('students.search') }}" class="btn btn-primary">بحث</a>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Group</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->student_name }}</td>
            <td>{{ optional($student->group)->groub_name }}</td>
            <td>{{ optional($student->course)->course_name }}</td>
            <td>
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">عرض</a>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">تعديل</a>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف الطالب؟')">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
