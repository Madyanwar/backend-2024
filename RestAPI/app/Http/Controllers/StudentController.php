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

		if ($students) {
			$response= [
				'message' => 'Successfully view all student',
				'data' => $students,
			];
			return response()->json($response, 200);
		} else {
			$response = [
				'message' => 'Student not found'
			];
			return response()->json($response, 200);
		}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $students = Student::all();
        if ($students) {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'email' => 'required | email',
            'majority' => 'required',
        ]);

        $input = [
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'majority' => $request->majority
        ];

        $students = Student::create($input);

        $data = [
            'messages' => 'Succesfuly Update student`',
            'data' => $students
        ];
        
        return response()->json($data, 201);

    } else {
        $data = [
            'message' => 'Student cannot be sent, please complete the data',
        ];

        return response()->json($data, 400);
    }
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

        if ($students) {
            $students->update([
                'name' => $request->name ?? $students->name,
                'nim' => $request->nim ?? $students->nim,
                'email' => $request->email ?? $students->email,
                'majority' => $request->majority ?? $students->majority
            ]);

            $data = [
                'message' => 'Succesfully update student',
                'data' => $students 
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            return response()->json($data, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $students = Student::find($id);

        if ($students) {
            $students->delete();

            $data = [
                'message' => 'Succesfully delete student',
                'data' => $students
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
            ];

            return response()->json($data, 400);
        }
    }
}