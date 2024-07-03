<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('course.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        if ($course->save()) {
            return redirect('course');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::find($id);
        return view('course.show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);
        return view('course.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        if ($course->save()) {
            return redirect('course');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        if ($course->delete()) {
            return redirect('course');
        }
    }
}