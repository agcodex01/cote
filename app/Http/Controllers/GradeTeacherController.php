<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GradeTeacherController extends Controller
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
    public function show(Teacher $teacher, Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher, Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher, Grade $grade)
    {
        //
    }
}
