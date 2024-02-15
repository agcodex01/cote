<?php

namespace App\Http\Controllers;

use App\Filters\SchoolYearFilter;
use App\Models\SchoolYear;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SchoolYearFilter $filter)
    {
        $headers = ['School Years'];
        $schoolYears = SchoolYear::filter($filter)->paginate(10);

        return view('school-years.index', compact('headers', 'schoolYears'));
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
            'from' => 'required|date',
            'to' => 'required|date',
            'current' => 'boolean'
        ]);

        $data = SchoolYear::create($data);

        return back()->with('success', 'School Year Succcessfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolYear $schoolYear)
    {
        $data = $request->validate([
            'from' => 'required|date',
            'to' => 'required|date',
            'current' => 'required'
        ]);

        if ($request->current == 1) {
            SchoolYear::query()->update([
                'current' => 0
            ]);
        }

        $schoolYear->update($data);

        return back()->with('success', 'School Year Succcessfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolYear $schoolYear)
    {
        $schoolYear->delete();

        return back()->with('success', 'School Year Succcessfully deleted!');
    }
}
