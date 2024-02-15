<?php

namespace App\Http\Controllers;

use App\Filters\CourseFilter;
use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CourseFilter $filter)
    {
        $headers = ['Courses'];

        $courses = Course::filter($filter)->paginate(10);

        return view('courses.index', compact('headers', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required',
            'description' => 'required',
        ]);

        $data = Course::create($data);

        return back()->with('success', 'Course Succcessfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $headers = [
            [
                'label' => 'Courses',
                'link' => route('courses.index')
            ],
            'Details'
        ];

        $yearLevels = YearLevel::all();
        $subjects = Subject::all();
        $semesters = Semester::all();

        return view('courses.show', compact('headers', 'course', 'yearLevels', 'subjects', 'semesters'));
    }

    public function addSubject(Course $course, Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'year_level_id' => 'required|exists:year_levels,id',
            'semester_id' => 'required|exists:semesters,id',
        ]);

        // Attach the YearLevel to the Course

        $course->yearLevels()->sync($request->year_level_id, false);

        if (!$course->semesters->contains(fn ($semester) => $semester->pivot->year_level_id === $request->year_level_id)) {
            $course->semesters()->attach([$request->semester_id => [
                'year_level_id' => $request->year_level_id,
            ]]);
        }


        $course->subjects()->syncWithoutDetaching([$request->subject_id => [
            'year_level_id' => $request->year_level_id,
            'semester_id' => $request->semester_id
        ]]);

        return back()->with('success', 'Subject Succcessfully Added to the Course!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'code' => 'required',
            'description' => 'required',
        ]);

        $course->update($data);

        return back()->with('success', 'Course Succcessfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('success', 'Course Succcessfully Deleted!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function removeSubject(Course $course, Subject $subject)
    {
        $course->subjects()->detach($subject);

        return back()->with('success', 'Subject Succcessfully Removed!');
    }
}
