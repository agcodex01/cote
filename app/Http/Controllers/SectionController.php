<?php

namespace App\Http\Controllers;

use App\Filters\SectionFilter;
use App\Models\Section;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SectionFilter $filter)
    {
        $headers = ['Sections'];

        $sections = Section::filter($filter)->with('room', 'teacher')->paginate(10);

        $rooms = Room::all();
        $teachers = Teacher::all();

        return view('sections.index', compact('headers', 'sections', 'rooms', 'teachers'));
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
            'room_id' => 'required|exists:rooms,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        Section::create($data);

        return back()->with('success', 'Section Succcessfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $data = $request->validate([
            'name' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $section->update($data);

        return back()->with('success', 'Section Succcessfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return back()->with('success', 'Section Succcessfully Deleted!');
    }
}
