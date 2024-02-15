<?php

namespace App\Http\Controllers;

use App\Consts\UserConstant;
use App\Models\Grade;
use App\Http\Controllers\Controller;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Student $student)
    {
        $headers = [];

        if (Auth::user()->type === UserConstant::STUDENT) {
            array_push($headers, 'My Grade');
        } else {
            array_push($headers, [
                'link' => route('students.show', $student),
                'label' => $student->user->getFullname()
            ], 'Grades');
        }

        $studentClass = StudentClass::where('student_id', $student->id)->first();


        return view('students.grades.index', compact('headers', 'student', 'studentClass'));
    }

    public function print(Student $student, Request $request)
    {
        $yearLevelId = $request->year_level_id;
        $semesterId = $request->semester_id;
        $studentClass = StudentClass::where('student_id', $student->id)
            ->where('year_level_id', $yearLevelId)
            ->where('semester_id', $semesterId)
            ->first();

        $schoolYear = SchoolYear::where('current', 1)->first();

        return view('students.grades.print', compact('student', 'yearLevelId', 'semesterId', 'studentClass', 'schoolYear'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Student $student)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Student $student)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student, Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student, Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student, Grade $grade)
    {
        //
    }
}
