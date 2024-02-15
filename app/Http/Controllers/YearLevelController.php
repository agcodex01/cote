<?php

namespace App\Http\Controllers;

use App\Filters\YearLevelFilter;
use App\Models\YearLevel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YearLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(YearLevelFilter $filter)
    {
        $headers = ['Year Levels'];

        $yearLevels = YearLevel::filter($filter)->paginate(10);

        return view('year-levels.index', compact('headers', 'yearLevels'));
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

        $data = YearLevel::create($data);

        return back()->with('success', 'Year Level Succcessfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(YearLevel $yearLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YearLevel $yearLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, YearLevel $yearLevel)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $yearLevel->update($data);

        return back()->with('success', 'Year Level Succcessfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YearLevel $yearLevel)
    {
        $yearLevel->delete();

        return back()->with('success', 'Year Level Succcessfully Deleted!');
    }
}
