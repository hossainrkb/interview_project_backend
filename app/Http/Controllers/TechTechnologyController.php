<?php

namespace App\Http\Controllers;

use App\Models\TechProbidhan;
use App\Models\TechTechnology;
use App\Http\Requests\StoreTechTechnologyRequest;
use App\Http\Requests\UpdateTechTechnologyRequest;

class TechTechnologyController extends CentralController
{
    public function probidhan()
    {
        $probidhans = TechProbidhan::all();
        return view('technology.probidhan')->with([
            'probidhans' => $probidhans
        ]);
    }
    public function probidhan_technology(TechProbidhan $probidhan)
    {
        return view('technology.probidhan-technology')->with([
            'technologies' => $probidhan->technology()->orderBy('d_name','ASC')->get(),
            'probidhan'  => $probidhan,
        ]);
    }
    public function technology_subject(TechProbidhan $probidhan,TechTechnology $technology)
    {
        return view('technology.technology-subject')->with([
            'probidhan'  => $probidhan,
            'technology'  => $technology,
        ]);
    }
    public function technology_subject_semester(TechProbidhan $probidhan,TechTechnology $technology)
    {
        return view('technology.technology-subject-semester')->with([
            'probidhan'  => $probidhan,
            'technology'  => $technology,
        ]);
    }
}
