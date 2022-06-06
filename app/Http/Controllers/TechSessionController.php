<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechSessionRequest;
use App\Http\Requests\UpdateTechSessionRequest;
use App\Models\TechSession;

class TechSessionController extends Controller
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
     * @param  \App\Http\Requests\StoreTechSessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechSessionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TechSession  $techSession
     * @return \Illuminate\Http\Response
     */
    public function show(TechSession $techSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TechSession  $techSession
     * @return \Illuminate\Http\Response
     */
    public function edit(TechSession $techSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechSessionRequest  $request
     * @param  \App\Models\TechSession  $techSession
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechSessionRequest $request, TechSession $techSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TechSession  $techSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechSession $techSession)
    {
        //
    }
}
