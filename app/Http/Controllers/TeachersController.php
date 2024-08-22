<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::paginate(5);
        return view('teacher.index', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'bio' => 'required'
        ]);

        Teacher::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'bio' => $request->bio
        ]);

        return redirect('teachers')->with('successMessage', 'Teacher Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::Find($id);
        return view('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::Find($id);
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'bio' => 'required'
        ]);

        Teacher::Find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'bio' => $request->bio
        ]);

        return redirect('teachers')->with('successMessage', 'Teacher Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::Find($id)->delete();
        return redirect('teachers')->with('successMessage', 'Teacher Removed Successfully.');
    }
}
