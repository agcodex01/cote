<?php

namespace App\Http\Controllers;

use App\Consts\UserConstant;
use App\Filters\TeacherFilter;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use App\Models\CourseSubject;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TeacherFilter $filter)
    {
        $headers = ['Teachers'];

        $teachers = Teacher::filter($filter)->paginate(10);

        return view('teachers.index', compact('headers', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $headers = [['label' => 'Teachers', 'link' => route('teachers.index')], 'Create'];
        return view('teachers.create', compact('headers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'mname' => 'nullable|min:3',
            'contact' => 'required',
            'address' => 'nullable|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $data['type'] = UserConstant::TEACHER;

        $user = User::create($data);

        $user->teacher()->create();

        return redirect()->route('teachers.index')->with('success', 'Teacher Succcessfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $headers = [
            [
                'label' =>  'Teachers',
                'link' => route('teachers.index')
            ],
            'Details'
        ];

        $subjects = CourseSubject::where('teacher_id', $teacher->id)->get();

        return view('teachers.show', compact('headers', 'teacher', 'subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $headers = [
            [
                'label' =>  'Teachers',
                'link' => route('teachers.index')
            ],
            'Edit'
        ];
        return view('teachers.edit', compact('headers', 'teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'mname' => 'nullable|min:3',
            'contact' => 'required',
            'address' => 'nullable|min:3',
            'email' => 'required|email',
        ]);

        $teacher->user->update($data);

        return redirect()->route('teachers.index')->with('success', 'Teacher Succcessfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher Succcessfully Deleted!');
    }
}
