<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Controllers\Controller;
use App\Models\CourseSubject;
use App\Models\Grade;
use App\Models\StudentClass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Teacher $teacher)
    {
        $headers = ['My Subjects'];
        return view('teachers.subjects.index', compact('headers', 'teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Teacher $teacher)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher, Subject $subject, Request $request)
    {
        $headers = [
            [
                'label' => 'My Subjects',
                'link' => route('teachers.subjects.index', $teacher)
            ],
            $subject->code
        ];

        $courseSubject = CourseSubject::findOrFail($request->course_subject_id);

        $studentIds = StudentClass::query()
            ->where('course_id', $courseSubject->course_id)
            ->where('year_level_id', $courseSubject->year_level_id)
            ->where('semester_id', $courseSubject->semester_id)
            ->where('section_id', $courseSubject->section_id)
            ->pluck('student_id')
            ->toArray();

        $grades = Grade::query()->where('year_level_id', $courseSubject->year_level_id)
            ->where('semester_id', $courseSubject->semester_id)
            ->where('subject_id', $subject->id)
            ->whereIn('student_id', $studentIds)
            ->get();

        return view('teachers.subjects.show', compact('headers', 'teacher', 'subject', 'grades', 'courseSubject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher, Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher, Subject $subject)
    {
        //
    }

    public function updateGrades(Request $request)
    {
        $data = $request->validate([
            'grades' => 'required|array',
            'grades.*.id' => 'required|exists:grades,id',
            'grades.*.mid' => 'nullable|numeric',
            'grades.*.final' => 'nullable|numeric',
        ]);

        $data = collect($data['grades'])->map(function ($grade) {
            if (isset($grade['mid']) && isset($grade['final'])) {
                $grade['average'] = ($grade['mid'] + $grade['final']) / 2;
            } else {
                $grade['average'] = null;
            }

            if (isset($grade['average'])) {
                if ($grade['average'] > 3) {
                    $grade['remarks'] = 'Failed';
                } else {
                    $grade['remarks'] = 'Passed';
                }
            } else {
                $grade['remarks'] = 'No Final Remarks';
            }
            return $grade;
        })->all();


        Grade::upsert($data, 'id');

        return back();
    }
}
