<?php

namespace App\Http\Controllers;

use App\Models\TechSession;
use App\Models\TechSubject;
use App\Models\TechSemester;
use Illuminate\Http\Request;
use App\Models\TechProbidhan;
use App\Models\TechTechnology;
use App\Http\Traits\TechSubjectTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreTechSubjectRequest;
use App\Http\Requests\UpdateTechSubjectRequest;
use App\Models\TechDeptSub;

class TechSubjectController extends CentralController
{
    use TechSubjectTrait;
    public function index()
    {
        //
    }

    public function create()
    {
        $probidhans = TechProbidhan::all();
        return view('subjects.create')->with([
            'probidhans' => $probidhans
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validator = $this->storeValidation($request);
            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if (auth()->user()->a_tpin != $request->a_tpin) {
                return redirect()->back()->withError('T-pin Not Match')->withInput();
            }
           $subject = $this->storeSubjectTrait($request);
            return redirect()->route('subjects.show',['subject'=>$subject->sub_id])->withSuccess('Course Successfully Added')->withInput();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withError($th->getMessage())->withInput();
        }
    }

    public function show(TechSubject $subject)
    {
        try {
            return view('subjects.show')->with([
                'subject' => $subject,
                's_department' => TechTechnology::where('d_probidhan',$subject->sub_probidhan)->get(),
                's_semester' => TechSemester::all()
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withError($th->getMessage());
        }
    }

    public function edit(TechSubject $techSubject)
    {
        //
    }

    public function update(UpdateTechSubjectRequest $request, TechSubject $techSubject)
    {
        //
    }

    public function destroy(TechSubject $techSubject)
    {
        //
    }
    private function storeValidation($request)
    {
        return Validator::make($request->all(), [
            'sub_code' => 'unique:tech_subjects,sub_code'
        ], [
            'sub_code.unique' => 'Subject Code has Already been Taken'
        ]);
    }
}
