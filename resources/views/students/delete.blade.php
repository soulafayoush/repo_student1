<form method="POST" action="{{ route('students.destroy', ['id' => $student->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>