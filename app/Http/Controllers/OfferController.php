<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Partner $partner)
    {
        return response()->json([
            'status' => 'ok',
            'data' => [
                'offers' => $partner->offers,
                'partner' => $partner
            ]
        ]);
    }
    public function list()
    {
        return response()->json([
            'status' => 'ok',
            'offers' => Offer::with('partner')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Partner $partner)
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Partner $partner)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['percentage'] = $request->percentage;
        $value = $request->image;
        if (is_file($value)) {
            $data = array_merge($data, $this->addAttachment($value));
        }
        $partner->offers()->create($data);
        return response()->json([
            'status' => 'ok',
            'data' => [
                'message' => 'Offer Successfully Added',
                'offers' => $partner->offers,
                'partner' => $partner
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        return response()->json([
            'status' => 'ok',
            'data' => $offer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfferRequest  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['percentage'] = $request->percentage;
        $value = $request->image;
        if (is_file($value)) {
            $data = array_merge($data, $this->addAttachment($value));
        }
        $offer->update($data);
        return response()->json([
            'status' => 'ok',
            'data' => [
                'message' => 'Offer Successfully Updated',
                'offers' => $offer,
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return response()->json([
            'status' => 'ok',
            'message' => 'Offer successfully deleted'
        ]);
    }

    private function addAttachment($value)
    {
        $originalName = $value->getClientOriginalName();
        $fileType = $value->getClientOriginalExtension();
        $storedName = str_replace("-", "_", \Illuminate\Support\Str::uuid()) . '_' . date('Y-m-d') . '.' . $fileType;
        $kb = $value->getSize() / 1024;
        $attachmentPath = '/app/public/offer/attachments/';
        $mb = $kb * 0.0009765625;
        $mb = isset($mb) ?  number_format($mb, 2, ".", ",") : 0;
        $value->move(storage_path('/app/public/offer/attachments/'), $storedName);
        return [
            'image_path' => $attachmentPath,
            'image_type' => $fileType,
            'image_original_name' => $originalName,
            'image_stored_name' => $storedName,
            'image_size' => $mb,
        ];
    }
}
