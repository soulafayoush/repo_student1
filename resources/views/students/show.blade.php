<h1>Student Details</h1>

<p><strong>Name:</strong> {{ $student->student_name }}</p>
<p><strong>Group:</strong> {{ optional($student->group)->groub_name }}</p>
<p><strong>Course:</strong> {{ optional($student->course)->course_name }}</p>
