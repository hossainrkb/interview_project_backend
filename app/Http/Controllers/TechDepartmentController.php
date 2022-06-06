<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechDepartmentRequest;
use App\Http\Requests\UpdateTechDepartmentRequest;
use App\Models\TechDepartment;

class TechDepartmentController extends Controller
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
     * @param  \App\Http\Requests\StoreTechDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechDepartmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TechDepartment  $techDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(TechDepartment $techDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TechDepartment  $techDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(TechDepartment $techDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechDepartmentRequest  $request
     * @param  \App\Models\TechDepartment  $techDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechDepartmentRequest $request, TechDepartment $techDepartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TechDepartment  $techDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechDepartment $techDepartment)
    {
        //
    }
}
