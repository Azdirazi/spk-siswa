<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Rating;
use App\Models\Student;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function view()
    {
        $studentData = Student::with('rating.subCriteria.criteria')->get();
        $criteriaData = Criteria::with('subCriteria')->get();
        $subCriteriaData = SubCriteria::all();

        return view('rating.rating', compact('studentData', 'criteriaData','subCriteriaData'));
    }
    public function add(Student $student,Rating $rating, Request $request)
    {
        $student_id = $student->get();
        $ratingData = collect($request->sub_criteria_id)->map(function($item) use ($student_id) {
            return [
                'sub_criteria_id' => $item,
                'student_id' => $student_id->student_id
            ];
        })->toArray();

        $rating->insert($ratingData);
        return redirect()->route('rating.view');
    }
    public function edit(){

    }
    public function delete(){

    }


}
