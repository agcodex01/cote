<?php

namespace App\Http\Controllers;

use App\Filters\SemesterFilter;
use App\Models\Semester;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SemesterFilter $filter)
    {
        $headers = ['Semesters'];
        $semesters = Semester::filter($filter)->paginate(10);

        return view('semesters.index', compact('headers', 'semesters'));
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
            'name' => 'required',
        ]);

        $data = Semester::create($data);

        return back()->with('success', 'Semester Succcessfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semester $semester)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $semester->update($data);

        return back()->with('success', 'Semester Succcessfully Added!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();

        return back()->with('success', 'Semester Succcessfully deleted!');
    }
}
