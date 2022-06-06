<?php
namespace App\Http\Controllers\Api;

use App\Models\TechProbidhan;
use App\Models\TechTechnology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechSubjectApiController extends CentralApiController
{
    public function get_technology_by_probidhan(TechProbidhan $probidhan){
        return success_response('Successfull',$probidhan->technology);
    }
    public function get_subject_by_technology(Request $request,TechTechnology $technology){
        $returnable_array = [];
        $subjects = [];
        if($request->search_keyword){
            $subjects = $technology->subjects()->whereRaw(
                'LOWER(sub_code) LIKE ? ',
                ["%" . strtolower(request('search_keyword') . "%")]
            )->orWhereRaw(
                'LOWER(sub_name) LIKE ? ',
                ["%" . strtolower(request('search_keyword') . "%")]
            )->get();
        }else{
          $subjects =  $technology->subjects;
        }
        foreach ($subjects as $key => $value) {
            $returnable_array[] =[
                'id'=> $value->sub_id,
                'sub_code' => $value->sub_code??null,
                'sub_name' => $value->sub_name??null,
                't' => $value->sub_t_credit??null,
                'p' => $value->sub_p_credit??null,
                'c' => $value->sub_total_credit??null,
                'tc' => $value->sub_tc_marks??null,
                'tf' => $value->sub_tf_marks??null,
                'pc' => $value->sub_pc_marks??null,
                'pf' => $value->sub_pf_marks??null,
                'marks' => $value->sub_total_marks??null,
            ];
        }
        return success_response('Successfull',collect($returnable_array)->paginate(DEFAULT_PAGINATE_ITEM));
    }
}
