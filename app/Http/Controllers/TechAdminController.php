<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechAdminRequest;
use App\Http\Requests\UpdateTechAdminRequest;
use App\Models\TechAdmin;

class TechAdminController extends Controller
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
     * @param  \App\Http\Requests\StoreTechAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TechAdmin  $techAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(TechAdmin $techAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TechAdmin  $techAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(TechAdmin $techAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechAdminRequest  $request
     * @param  \App\Models\TechAdmin  $techAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechAdminRequest $request, TechAdmin $techAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TechAdmin  $techAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechAdmin $techAdmin)
    {
        //
    }
}
