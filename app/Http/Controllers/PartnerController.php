<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'status' => 'ok',
            'data' => Partner::all()
        ]);
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
     * @param  \App\Http\Requests\StorePartnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partner = Partner::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);
        return response()->json([
            'status' => 'ok',
            'message' => 'Partner successfully added',
            'data' => $partner
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return response()->json([
            'status' => 'ok',
            'data' => $partner
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePartnerRequest  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->update([
            'name' => $request->name,
            'location' => $request->location,
        ]);
        return response()->json([
            'status' => 'ok',
            'message' => 'Partner successfully updated',
            'data' => $partner
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return response()->json([
            'status' => 'ok',
            'message' => 'Partner successfully deleted'
        ]);
    }
}
