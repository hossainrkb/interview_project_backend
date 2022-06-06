<?php
namespace App\Http\Controllers\Api;

use App\Models\TechSemester;
use Illuminate\Http\Request;
use App\Models\TechProbidhan;
use App\Models\TechTechnology;
use App\Scopes\TechSemesterScope;
use Illuminate\Support\Facades\Auth;

class TechSemesterApiController extends CentralApiController
{
    public function get_technology_by_semester($semester){
        $tech_semester =  TechSemester::withoutGlobalScope(TechSemesterScope::class)->find($semester);
        if(empty($tech_semester))return error_response('Semester Not Found');
        
        return success_response('Successfull',$probidhan->technology);
    }
}
