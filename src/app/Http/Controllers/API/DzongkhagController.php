<?php

namespace App\Http\Controllers\API;

use App\Dzongkhag;
use App\Http\Controllers\Controller;
use App\Http\Resources\Dzongkhag as DzongkhagResource;
use Illuminate\Http\Request;

class DzongkhagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // $dzongkhags = Dzongkhag::where('id', '=',1)->get();
        $dzongkhags = Dzongkhag::all();
        return response([ 'data' => DzongkhagResource::collection($dzongkhags), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dzongkhag  $dzongkhag
     * @return \Illuminate\Http\Response
     */
    public function show(Dzongkhag $dzongkhag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dzongkhag  $dzongkhag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dzongkhag $dzongkhag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dzongkhag  $dzongkhag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dzongkhag $dzongkhag)
    {
        //
    }
}
