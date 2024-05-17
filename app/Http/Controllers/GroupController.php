<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Year;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function view(Grade $grade, Year $year)
    {
        $gradeData = $grade->get();
        $yearData = $year->get();
        return view('dashboard.dashboard', compact('gradeData', 'yearData'));
    }
}
