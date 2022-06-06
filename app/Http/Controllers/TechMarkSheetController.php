<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechMarkSheetRequest;
use App\Http\Requests\UpdateTechMarkSheetRequest;
use App\Models\TechMarkSheet;
use App\Models\TechSemester;
use App\Models\TechSession;
use App\Models\TechShift;
use App\Scopes\TechSemesterScope;

class TechMarkSheetController extends Controller
{

    public function create()
    {
        $shifts = TechShift::pluck('shift_name','shift_id')->toArray();
        $sessions_array = array();
        $sessions = TechSession::orderBy('sec_year','DESC')->get();
        foreach ($sessions as $key => $value) {
           $semester =  TechSemester::withoutGlobalScope(TechSemesterScope::class)->find($value->sec_sem);
           if($semester){
               $sessions_array[$key] = $value;
               $sessions_array[$key]['semester'] = $semester;
           } 
        }
        return view('students.results.create')->with([
            'sessions' => $sessions,
            'shifts'   => $shifts
        ]);
    }
}
