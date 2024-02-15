<?php

namespace App\Http\Controllers;

use App\Consts\UserConstant;
use App\Filters\StudentFilter;
use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StudentFilter $filter)
    {
        $headers = ['Students'];

        $students = Student::filter($filter)->paginate(10);

        return view('students.index', compact('headers', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $headers = [['label' => 'Students', 'link' => route('students.index')], 'Create'];
        return view('students.create', compact('headers'));
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
            'id_number' => 'required'
        ]);

        $data['type'] = UserConstant::STUDENT;

        $user = User::create($data);

        $user->student()->create(['id_number' => $data['id_number']]);

        return redirect()->route('students.index')->with('success', 'Student Succcessfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $headers = [
            [
                'label' =>  'Students',
                'link' => route('students.index')
            ],
            'Details'
        ];

        return view('students.show', compact('headers', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $headers = [
            [
                'label' =>  'Students',
                'link' => route('students.index')
            ],
            'Edit'
        ];

        return view('students.edit', compact('headers', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'mname' => 'nullable|min:3',
            'contact' => 'required',
            'address' => 'nullable|min:3',
            'email' => 'required|email',
            'id_number' => 'required'
        ]);

        $data['type'] = 'student';

        $student->user->update($data);

        $student->update(['id_number' => $data['id_number']]);

        return redirect()->route('students.index')->with('success', 'Student Succcessfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student Succcessfully Deleted!');
    }
}
