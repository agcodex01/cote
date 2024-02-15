<?php

namespace App\Http\Controllers;

use App\Filters\StudentClassFilter;
use App\Models\StudentClass;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Student;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StudentClassFilter $filter)
    {
        $headers = ['Student Classes'];

        $studentClasses = StudentClass::filter($filter)->groupBy('student_id')->paginate(10);

        $courses = Course::all();
        $students = Student::all();
        $yearLevels = YearLevel::all();
        $semesters = Semester::all();
        $sections = Section::all();

        return view('student-classes.index', compact(
            'headers',
            'studentClasses',
            'courses',
            'students',
            'yearLevels',
            'semesters',
            'sections'
        ));
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
            'student_id' => 'required|exists:students,id',
            'section_id' => 'required|exists:sections,id',
            'year_level_id' => 'required|exists:year_levels,id',
            'semester_id' => 'required|exists:semesters,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        StudentClass::create($data);

        $course = Course::find($request->course_id);
        $student = Student::find($request->student_id);

        $student->yearLevels()->sync($request->year_level_id, false);

        if (!$student->semesters->contains(fn ($semester) => $semester->id == $request->semester_id && $semester->pivot->year_level_id == $request->year_level_id)) {
            $student->semesters()->attach([$request->semester_id => [
                'year_level_id' => $request->year_level_id,
            ]]);
        }

        $course->subjects
            ->where("pivot.year_level_id", $request->year_level_id)
            ->where("pivot.semester_id", $request->semester_id)
            ->each(function ($subject) use ($request, $student) {
                $subject->grades()->create([
                    'student_id' => $request->student_id,
                    'semester_id' => $request->semester_id,
                    'year_level_id' => $request->year_level_id,
                ]);
            });

        return back()->with('success', 'Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentClass $studentClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentClass $studentClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentClass $studentClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentClass $studentClass)
    {
        //
    }
}
