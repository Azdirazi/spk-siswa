<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Student;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function view(Student $student, Rating $rating)
    {
        $studentData = $student->get();
        $ratingData = Rating::with(['student', 'subCriteria'])->get();
        return view('rating.rating', compact('ratingData', 'studentData'));
    }
    public function add(Rating $rating, Request $request)
    {
        $rating->create($request->all());
        return redirect()->route('rating.view');
    }

    
}
