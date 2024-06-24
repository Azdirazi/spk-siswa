<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Year;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function view(Student $student)
    {

        $studentData = Student::with(['grade', 'year'])->get();
        return view('student.student', compact('studentData'));
    }

    public function viewAdd(Grade $grade, Year $year)
    {
        $gradeData = $grade->get();
        $yearData = $year->get();
        return view('student.add-student', compact('gradeData', 'yearData'));
    }
    public function add(Student $student, Request $request)
    {

        $data = $request->all();
        $student->create($data);

        return redirect(route('student.view'))->with('success', 'Data user berhasil ditambahkan');
    }
    public function viewEdit(Student $student,Grade $grade, Year $year)
    {
        $gradeData = $grade->get();
        $yearData = $year->get();
        return view('student.edit-student', compact('student','gradeData', 'yearData'));
    }
    public function edit(Student $student, Request $Request)
    {
        $data = $Request->all();
        $student->update($data);
        return redirect(route('student.view'))->with('success', 'Data user berhasil diubah');
    }
    public function delete(Student $student,)
    {
        $student->delete();
        return redirect(route('student.view'))->with('success', 'Data user berhasil diubah');
    }
}
