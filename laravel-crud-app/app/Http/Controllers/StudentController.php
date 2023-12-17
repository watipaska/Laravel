<?php

namespace App\Http\Controllers;

use App\Models\Student; // Update the namespace
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a listing of the resource. Return JSON
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $student = Student::create($validatedData);

        return response()->json($student, 201);
    }

    // Display the specified resource.
    public function show(Student $student)
    {
        return response()->json($student);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $student->update($validatedData);

        return response()->json($student, 200);
    }

    // Remove the specified resource from storage.
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(null, 204);
    }
}
