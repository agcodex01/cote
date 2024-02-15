<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class CourseSubjectController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $headers = [
            [
                'link' => route('courses.index'),
                'label' => 'Courses'
            ],
            [
                'link' => route('courses.show', $course),
                'label' => $course->code,
            ],
            'Add Subject'
        ];

        $yearLevels = YearLevel::all();
        $subjects = Subject::all();
        $semesters = Semester::all();
        $sections = Section::all();
        $teachers = Teacher::all();

        return view('courses.subjects.create', compact(
            'headers',
            'course',
            'yearLevels',
            'subjects',
            'semesters',
            'sections',
            'teachers'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Course $course, Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'year_level_id' => 'required|exists:year_levels,id',
            'semester_id' => 'required|exists:semesters,id',
            'section_id' => 'required|exists:sections,id',
            'teacher_id' => 'required|exists:teachers,id',
            'time_from' => 'required',
            'time_to' => 'required',
            'days' => 'required|array'
        ]);

        // Attach the YearLevel to the Course

        $course->yearLevels()->sync($request->year_level_id, false);

        if (!$course->semesters->contains(fn ($semester) => $semester->id == $request->semester_id && $semester->pivot->year_level_id == $request->year_level_id)) {
            $course->semesters()->attach([$request->semester_id => [
                'year_level_id' => $request->year_level_id,
            ]]);
        }

        $subjectTeacher = Teacher::find($request->teacher_id);

        $subjectTeacher->yearLevels()->sync($request->year_level_id, false);
        if (!$subjectTeacher->semesters->contains(fn ($semester) => $semester->id == $request->semester_id && $semester->pivot->year_level_id == $request->year_level_id)) {
            $subjectTeacher->semesters()->attach([$request->semester_id => [
                'year_level_id' => $request->year_level_id,
            ]]);
        }

        $course->subjects()->syncWithoutDetaching([$request->subject_id => [
            'year_level_id' => $request->year_level_id,
            'semester_id' => $request->semester_id,
            'section_id' => $request->section_id,
            'teacher_id' => $request->teacher_id,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'days' => $request->days,
        ]]);

        return redirect()->route('courses.show', $course)->with('success', 'Subject Succcessfully Added to the Course!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
