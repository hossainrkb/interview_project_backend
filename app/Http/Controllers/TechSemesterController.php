<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechSemesterRequest;
use App\Http\Requests\UpdateTechSemesterRequest;
use App\Models\TechSemester;

class TechSemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechSemesterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechSemesterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TechSemester  $techSemester
     * @return \Illuminate\Http\Response
     */
    public function show(TechSemester $techSemester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TechSemester  $techSemester
     * @return \Illuminate\Http\Response
     */
    public function edit(TechSemester $techSemester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechSemesterRequest  $request
     * @param  \App\Models\TechSemester  $techSemester
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechSemesterRequest $request, TechSemester $techSemester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TechSemester  $techSemester
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechSemester $techSemester)
    {
        //
    }
}
