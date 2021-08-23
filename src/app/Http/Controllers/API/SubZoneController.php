<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubZone as SubZoneResource;
use App\SubZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->is_argszone_id){
            $sub_zones = SubZone::where('zone_id',$request->is_argszone_id)->get()->sortBy('name');
        }
        else{
            $sub_zones = SubZone::all()->sortBy('name');
        }
        
        return response([ 'data' => SubZoneResource::collection($sub_zones), 'message' => 'Retrieved successfully'], 200);
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
     * @param  \App\SubZone  $subZone
     * @return \Illuminate\Http\Response
     */
    public function show(SubZone $subZone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubZone  $subZone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubZone $subZone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubZone  $subZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubZone $subZone)
    {
        //
    }
}
