<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'age' => 'required',
            'department' => 'required',
        ]);
        
        // Check if validation fails
        if ($validator->fails()) {
            // If validation fails, redirect back to the '/home' route
            // with errors and the input data from the request
            return redirect('/home')
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve the validated data from the validator
        $validated = $validator->validated();

        // Create a new Student record in the database using the validated data
        Student::create($validated);

        // Redirect to the '/home' route after successful data creation
        return redirect('/home');
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
