<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Building;

use App\Http\Resources\Building as BuildingResource;



class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
        //   return $building;

       // return $request;

        $sub_zone_id = $request->is_argssub_zone_id;

        // $building = \App\Building::where('sub_zone_id', $sub_zone_id)->get();

        // $sub_zone_id = $request->sub_zone_id;

        $building = \App\Building::where('sub_zone_id', $sub_zone_id)->get();

        $building_geoJson = collect($building)->map(function ($item){
            $geojson = array(
                "type" => "Point",
                "properties" => array(
                    "id" => $item['building_number'],
                    "building_id" => $item['id'],
                    "sub_zone_id" => $item['sub_zone_id'],
                    "status" => $item['status']
                ),
                "coordinates" => array( $item['lng'], $item['lat'])
            );
            return $geojson;
        });
        
        return response()->json($building_geoJson,200);
        // return response([ 'data' => $building_geoJson, 'message' => 'Retrieved successfully'], 200);
        
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
        $building = new Building;

        $building->building_number =  count(Building::all())+1000011;

        $building->lat = $request->lat;
        $building->lng = $request->lng;
    
        $building->sub_zone_id = $request->sub_zone_id;
        $building->status = "INCOMPLETE";
        $building->save();
        return response([ 'data' => new BuildingResource($building), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        //
       
        $building->status = "COMPLETED";
        $building_update = $building->save();
        if($building_update){
            return response([ 'data' => new BuildingResource($building), 'message' => 'Retrieved successfully'], 200);
        }
        else{
            return response([ 'data' => null, 'message' => 'Could not update building status'], 200);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function markHouseholdComplete(Request $request, $id){


        $building = Building::find($id);

        if($building){
            $building->status = $request->status;
            $building_update = $building->save();
            if($building_update){
    
                return response([ 'data' => new BuildingResource($building), 'message' => 'Building status updated successfully'], 200);
    
            }
            else{
                return response([ 'data' => null, 'message' => 'Could not update building status'], 200);
            }
        }
        else{
            return response([ 'data' => null, 'message' => 'Could not update building status'], 200);
        }
       
    }
}
