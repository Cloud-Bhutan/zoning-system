<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DailyScanLog as DailyScanLogResource;


class ScanLogController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $scan = new \App\DailyScanLog;
        $scan->user_id = $request->user_id;
        $scan->qr_code_id = $request->qr_code_id;
        $scan->sub_zone_id = $request->sub_zone_id;
        $scan->lat = $request->lat;
        $scan->lng = $request->lng;
        $scan->household_detail_id = $request->household_detail_id;
        $scan->accuracy = $request->accuracy;

        $scan->save();

        if($scan){
            return response([ 'data' => new DailyScanLogResource($scan), 'message' => 'Scan successfull'], 200);
        }
        else{
            return response([ 'data' => null, 'message' => 'Scaning, try again'], 200);
        } 
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
    public function update(Request $request, $id)
    {
        //
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


    public function scanByDesuugApp(Request $request){

        $qrCode = \App\QrCode::where('uuid',$request->qr_uuid)->first();

        if($qrCode){
            if($qrCode->status === 'active'){
                $household = \App\HouseholdDetail::where('qr_code_id',$qrCode->id)->first();
                $user = \App\Domains\Auth\Models\User::where('cid',$request->cid)->first();

                if($user && $household){

                    $scan = new \App\DailyScanLog;

                    $scan->user_id = $user->id;

                    $scan->qr_code_id = $qrCode->id;

                    $scan->sub_zone_id = $household->building->sub_zone_id;

                    $scan->lat = $request->lat;

                    $scan->lng = $request->lng;

                    $scan->household_detail_id = $household->id;

                    $scan->accuracy = $request->accuracy;

                    $scan->save();


                    if($scan){
                        return response([ 'data' => new DailyScanLogResource($scan), 'zone'=>$scan->householdDetail->building->subZone->zone->name, 'sub_zone' => $scan->householdDetail->building->subZone->name, 'message' => 'Scan successfull'], 200);
                    }
                    else{
                        return response([ 'data' => null, 'message' => 'Scaning, try again'], 200);
                    }   
                }
                else{
                    return response([ 'data' => null, 'message' => 'Invalid QR code'], 200);
                }

            }
            else{
                return response([ 'data' => null, 'message' => 'QR Code Not registered with household'], 200);
            }
        }
        else{
            return response([ 'data' => null, 'message' => 'Invalid QR code'], 200);
        }
    }
}
