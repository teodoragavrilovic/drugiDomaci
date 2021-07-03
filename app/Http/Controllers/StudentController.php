<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::all();
        return view('students',["students"=>$students]);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input['first_name']=$request->first_name;
        $input['last_name']=$request->last_name;
        $input['index']=$request->index_number.'/'.$request->index_year;

        Student::create($input);
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        
        return view('student',['student'=>$student,'exams'=>$student->exams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $student=Student::find($id);
        if(isset($_POST['delete'])){
            $student->delete();
           
        }else{
            $exploed=explode('/',$student->index);
            if(isset($request->first_name)){
                $student->first_name=$request->first_name;
            }
            if(isset($request->last_name)){
                $student->last_name=$request->last_name;
            }
            if(isset($request->index_year)){
               $student->index=$exploed[0].'/'.$request->index_year;
            }
            $exploed=explode('/',$student->index);
            if(isset($request->index_number)){
                $student->index=$request->index_number.'/'.$exploed[1];
             }
            $student->save();
        }
        return redirect('/students');

    }

  
}
