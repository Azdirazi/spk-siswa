<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function view(Student $student){
        $studentData=$student->get();
        return view('student.student',compact('studentData'));
    }

    public function viewAdd(){
       
        return view('student.add-student');
    }
    public function add(Student $student,Request $studentRequest){
        $data = $studentRequest->all();
        $student->create($data);
        return redirect(route('student.view'))->with('success', 'Data user berhasil ditambahkan');
    }
    public function viewEdit(Student $student){
       
        return view('student.edit-student',compact('student'));
    }
    public function edit(Student $student,Request $Request){
        $data = $Request->all();
        $student->update($data);
        return redirect(route('student.view'))->with('success', 'Data user berhasil diubah');
    }
    public function delete(Student $student,){
       $student->delete();
       return redirect(route('student.view'))->with('success', 'Data user berhasil diubah');
    }
}
