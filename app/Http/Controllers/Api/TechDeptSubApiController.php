<?php

namespace App\Http\Controllers\Api;

use App\Models\TechDeptSub;
use App\Models\TechSemester;
use App\Models\TechSubject;
use Illuminate\Http\Request;
use App\Models\TechTechnology;

class TechDeptSubApiController extends CentralApiController
{
    public function store(Request $request, TechSubject $subject)
    {
        try {
            if (auth()->user()->a_tpin != $request->a_tpin) {
                return error_response('T-pin Not Match');
            }
            $check_sub_assigned_dept_or_not = TechDeptSub::where([
                'ds_dept_id' => $request->s_dept,
                'ds_sub_id' => $subject->sub_id,
            ])->first();
            $technology = TechTechnology::find($request->s_dept);
            if ($check_sub_assigned_dept_or_not) {
                return error_response("$subject->sub_name ($subject->sub_code) has Already Assigned to $technology->d_name");
            }
            TechDeptSub::create([
                'ds_sub_id'    => $subject->sub_id,
                'ds_dept_id'   => $technology->d_id,
                'ds_sem_id'    => $request->s_sem,
                'ds_check_key' => $subject->sub_id . "." . $technology->d_id
            ]);
            return success_response("$subject->sub_name ($subject->sub_code) has Successfully Assigned to $technology->d_name");
        } catch (\Throwable $th) {
            return error_response($th->getMessage());
        }
    }
    public function get_technology_by_subject(TechSubject $subject)
    {
        $returnable_array = [];
        $dept_list = TechDeptSub::where('ds_sub_id', $subject->sub_id)->orderBy('ds_id', 'DESC')->get();
        if (count($dept_list)) {
            foreach ($dept_list as $key => $value) {
                $returnable_array[] = [
                    'ds_id' => $value->ds_id ?? null,
                    'technology' => $value->technology->d_name ?? null,
                    'semester' => $value->semester->sem_name ?? null
                ];
            }
        }
        // for ($i = 0; $i < 100; $i++) {
        //     $returnable_array[] = [
        //         'id' => $i+1 ?? null,
        //         'technology' => $i . " dept",
        //         'semester' => $i . " sem",
        //     ];
        // }
        return success_response('Successfull', collect($returnable_array)->paginate(DEFAULT_PAGINATE_ITEM));
    }

    public function delete(Request $request, TechDeptSub $techsubject)
    {
        try {
            if (auth()->user()->a_tpin != $request->a_tpin) {
                return error_response('T-pin Not Match');
            }
            $techsubject->delete();
            return success_response('Successfully Deleted');
        } catch (\Throwable $th) {
            return error_response($th->getMessage());
        }
    }
    public function subject_structure_by_technology(TechTechnology $technology)
    {
        try {
            $returnable_array = [];
            $semesters = TechSemester::orderBy('sem_id')->get();
            if (count($semesters)) {
                foreach ($semesters as $key => $value) {
                    $returnable_array[$value->sem_name] = [];
                    $tech_dept_subs = TechDeptSub::where([
                        'ds_sem_id' => $value->sem_id,
                        'ds_dept_id' => $technology->d_id,
                    ])->get();
                    if (count($tech_dept_subs)) {
                        $i = 1;
                        $t_t = 0;
                        $t_p = 0;
                        $t_t_c = 0;
                        $t_tc = 0;
                        $t_tf = 0;
                        $t_pc = 0;
                        $t_pf = 0;
                        $t_tm = 0;
                        foreach ($tech_dept_subs as $key => $tech_dept_sub) {
                            $subject = $tech_dept_sub->subject;
                            if ($subject) {
                                $returnable_array[$value->sem_name][] =
                                    [
                                        'sn' => $i++,
                                        'sub_code' => $subject->sub_code ?? null,
                                        'sub_name' => $subject->sub_name ?? null,
                                        't' => $subject->sub_t_credit ?? null,
                                        'p' => $subject->sub_p_credit ?? null,
                                        'c' => $subject->sub_total_credit ?? null,
                                        'tc' => $subject->sub_tc_marks ?? null,
                                        'tf' => $subject->sub_tf_marks ?? null,
                                        'pc' => $subject->sub_pc_marks ?? null,
                                        'pf' => $subject->sub_pf_marks ?? null,
                                        'marks' => $subject->sub_total_marks ?? null,
                                        'sub_id' => $subject->sub_id ?? null
                                    ];
                                $t_t   = $t_t + $subject->sub_t_credit;
                                $t_p   = $t_p + $subject->sub_p_credit;
                                $t_t_c = $t_t_c + $subject->sub_total_credit;
                                $t_tc  = $t_tc + $subject->sub_tc_marks;
                                $t_tf  = $t_tf + $subject->sub_tf_marks;
                                $t_pc  = $t_pc + $subject->sub_pc_marks;
                                $t_pf  = $t_pf + $subject->sub_pf_marks;
                                $t_tm  = $t_tm + $subject->sub_total_marks;
                            }
                        }
                        $returnable_array[$value->sem_name]['total'] = [
                            'sn' => '',
                            'sub_code' => '',
                            'sub_name' => '<p class="text-right">Total</p>',
                            't' => $t_t,
                            'p'   => $t_p,
                            'c' => $t_t_c,
                            'tc'  => $t_tc,
                            'tf'  => $t_tf,
                            'pc'  => $t_pc,
                            'pf'  => $t_pf,
                            'marks'  => $t_tm,
                            'sub_id' => ''
                        ];
                    }
                }
            }
            return success_response('Successfully', $returnable_array);
        } catch (\Throwable $th) {
            return error_response($th->getMessage());
        }
    }
}
