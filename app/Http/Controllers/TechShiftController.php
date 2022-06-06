<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechShiftRequest;
use App\Http\Requests\UpdateTechShiftRequest;
use App\Models\TechShift;

class TechShiftController extends Controller
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
     * @param  \App\Http\Requests\StoreTechShiftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechShiftRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TechShift  $techShift
     * @return \Illuminate\Http\Response
     */
    public function show(TechShift $techShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TechShift  $techShift
     * @return \Illuminate\Http\Response
     */
    public function edit(TechShift $techShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechShiftRequest  $request
     * @param  \App\Models\TechShift  $techShift
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechShiftRequest $request, TechShift $techShift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TechShift  $techShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechShift $techShift)
    {
        //
    }
}
