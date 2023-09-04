<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ./stufhug/jhsgjhg.php
        $student = Student::all();
        return  view('student.index' , compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('student.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $student = new Student; // class {model}
         $student->name = $request->input('name');
         $student->cource = $request->input('cource');
         $student->save();
         return redirect('student')->with('status' , 'student added');
        
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return response()->json([
                'status'=>200,
                'student'=>$student,
        ]);
    }
    public function update(Request $request)
    {
         $stuid = $request->input('stuid');
         $student=Student::find($stuid);
         $student->name=$request->input('name');
         $student->cource=$request->input('cource');
         $student->update();    
         return redirect()->back()->with('status' , 'student added');

    }
    public function destroy($id){
        $student=Student::find($id);
        $student->delete();
        return redirect('student')->with('status' , 'delete added');


    }
 
}
