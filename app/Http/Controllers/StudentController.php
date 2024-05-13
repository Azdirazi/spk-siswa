<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentAdd(){
        return view('student.add-student');
    }
}
