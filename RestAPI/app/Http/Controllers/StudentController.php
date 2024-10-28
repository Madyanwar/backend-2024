<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        
        $response = [
            'message' => 'Success Showing All Students Data',
            'data' => $students
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = [
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'majority' => $request->majority
           ];
    
           $students = Student::create($input);
    
           $response = [
            'message' => 'Successfully create new student',
            'data' => $students
           ];
           
           return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $students = Student::find($id);
        if (!$students) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $students->update($request->only(['name', 'nim','email', 'majority']));

        $response = [
            'message' => 'Successfully update new student',
            'data' => $students
           ];
        
           return response()->json($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Student::find($id);
        if (!$students) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $students->delete();

        $response = [
            'message' => 'Successfully delete student',
            'data' => $students
           ];
        
           return response()->json($response, 201);
    }
}