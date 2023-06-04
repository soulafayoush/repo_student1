<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Group;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {  
        $students = Student::with('group', 'course')->get();
    
        return view('students.index', compact('students'));
    }
    

    public function create()
    {
        $groups = Group::pluck('groub_name', 'id');
        $courses = Course::pluck('course_name', 'id_course');
        return view('students.create', compact('groups', 'courses'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'group_id' => 'required|exists:groups,id',
            'course_id' => 'required|exists:courses,id_course',
        ]);

        $student = new Student();
        $student->student_name = $validated['name'];
        $student->id_f = $validated['group_id'];
        // $student->course_id = $validated['course_id'];
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function show($id)
    {
        $student = Student::with('group', 'course')->find($id);
        
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $groups = Group::pluck('groub_name', 'id');
        $courses = Course::pluck('course_name', 'id_course');
        return view('students.edit', compact('student', 'groups', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'group_id' => 'required|exists:groups,id',
            'course_id' => 'required|exists:courses,id_course',
        ]);

        $student = Student::find($id);
        $student->student_name = $validated['name'];
        $student->id_f = $validated['group_id'];
        // $student->course_id = $validated['course_id'];
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search_query');
    
        $students = Student::whereHas('group', function ($query) use ($searchQuery) {
                $query->where('name', 'like', "%$searchQuery%");
            })
            ->orWhereHas('course', function ($query) use ($searchQuery) {
                $query->where('name', 'like', "%$searchQuery%");
            })
            ->get();
    
        return view('students.search', compact('students'));
    }
    

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
