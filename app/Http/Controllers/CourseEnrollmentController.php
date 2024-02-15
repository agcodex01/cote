<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Semester;
use App\Models\StudentClass;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class CourseEnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course, Request $request)
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
            'Enroll Student'
        ];

        $yearLevels = YearLevel::all();
        $semesters = Semester::all();

        return view('courses.enrollments.create', compact('headers', 'course', 'yearLevels', 'semesters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
