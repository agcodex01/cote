<?php

namespace App\Http\Controllers;

use App\Filters\SubjectFilter;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use App\Models\Semester;
use App\Models\YearLevel;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubjectFilter $filter)
    {
        $headers = ['Subjects'];

        $subjects = Subject::filter($filter)->paginate(10);

        return view('subjects.index', compact('headers', 'subjects'));
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
            'code' => 'required|unique:subjects,code',
            'description' => 'required',
            'units' => 'required'
        ]);

        $data = Subject::create($data);

        return back()->with('success', 'Subject Succcessfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        $headers = [
            [
                'link' => route('subjects.index'),
                'label' => 'Subjects'
            ],
            'Details'
        ];
        $yearLevels = YearLevel::all();
        $semesters = Semester::all();
        return view('subjects.show', compact('headers', 'subject', 'yearLevels', 'semesters'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $data = $request->validate([
            'code' => 'required|unique:subjects,code',
            'description' => 'required',
            'units' => 'required'
        ]);

        $subject->update($data);

        return back()->with('success', 'Subject Succcessfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return back()->with('success', 'Subject Succcessfully Deleted!');
    }
}
