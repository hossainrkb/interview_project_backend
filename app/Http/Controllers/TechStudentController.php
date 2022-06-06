<?php

namespace App\Http\Controllers;

use App\Models\TechShift;
use App\Models\TechSession;
use App\Models\TechStudent;
use Illuminate\Http\Request;
use App\Http\Traits\TechStudentTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreTechStudentRequest;
use App\Http\Requests\UpdateTechStudentRequest;
use App\Rules\ContactNumber;

class TechStudentController extends Controller
{
    use TechStudentTrait;

    public function index()
    {
        //
    }
    public function create()
    {
        $shifts = TechShift::all();
        $sessions = TechSession::all();
        return view('students.create')->with([
            'shifts' => $shifts,
            'sessions' => $sessions
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
            $student = $this->storeStudentTrait($request);
            return redirect()->back()->withSuccess('Student Successfully Registered')->withInput();
            // return redirect()->route('subjects.show',['subject'=>$subject->sub_id])->withSuccess('Course Successfully Added')->withInput();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->withError($th->getMessage())->withInput();
        }
    }


    public function show(TechStudent $techStudent)
    {
        //
    }

   
    public function edit(TechStudent $techStudent)
    {
        //
    }

   
    public function update(UpdateTechStudentRequest $request, TechStudent $techStudent)
    {
        //
    }

 
    public function destroy(TechStudent $techStudent)
    {
        //
    }
    private function storeValidation($request)
    {
        return Validator::make($request->all(), [
            's_contact_no' => ['required', 'unique:tech_student,s_contact_no', new ContactNumber],
            's_board_roll' => 'unique:tech_student,s_board_roll',
            's_board_reg_no' => 'unique:tech_student,s_board_reg_no',
        ], [
            's_contact_no.unique' => 'Student Contact No has Already been Taken',
            's_board_roll.unique' => 'Student Board Roll has Already been Taken',
            's_board_reg_no.unique' => 'Student Board Registration No has Already been Taken',
        ]);
    }
}
