<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\QrCode;
use App\Http\Resources\QrCode as QrCodeResource;
use App\Http\Resources\HouseholdDetail as HouseholdDetailResource;

use Illuminate\Http\Request;

class QrCodeController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function show($qrCode)
    {

        $qr = QrCode::find($qrCode);
        if($qr){
            if($qr->status == 'active'){

                $household_detail = \App\HouseholdDetail::where('qr_code_id',$qr->id)->first();
                
                return response([ 'data' => new QrCodeResource($household_detail), 'message' => 'Already in use'], 200);

            }
            else{

                return response([ 'data' => new QrCodeResource($qr), 'message' => 'Retrieved successfully'], 200);
            }
        }
        else{
            return response([ 'data' => null, 'message' => 'Invalid QR Code'], 200);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QrCode $qrCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(QrCode $qrCode)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function validateQr($requestType, $uuid)
    {
        
        if($requestType == 'scan'){
            $qr = QrCode::where('uuid','=',$uuid)->first();
          
            if($qr){
                if($qr->status == 'active'){
                    //return $qr->id;
                    $household_details = \App\HouseholdDetail::where('qr_code_id', $qr->id)->first();
                    //return $household_details->toJson();
                    return response(['data' => new HouseholdDetailResource($household_details),
                    'zone'=>$household_details->building->subZone->zone->name, 'sub_zone' => $household_details->building->subZone->name,
                    'qr_code_id'=>$household_details->qr_code_id,'status_code' =>'ACTIVE' , 'message' => 'Retrieved successfully'], 200);
                }
                else{
                    return response([ 'data' => null,'qr_code_id' => $qr->id, 'status_code' =>'INACTIVE','message' => 'Invalid QR Code'], 200);
                }
            }
            else{
                return response([ 'data' => null, 'status_code' =>'INVALID','message' => 'Invalid QR Code'], 200);
            }
        }
        else{
            $qr = QrCode::where('uuid','=',$uuid)->first();
            
            if($qr){
                if($qr->status == 'inactive'){
                    return response(['qr_code_id'=>$qr->id,'status_code' =>'INACTIVE' , 'message' => 'Retrieved successfully'], 200);
                }
                else{
                    return response(['status_code' => 'ACTIVE', 'message' => 'Already in use'], 200);
                }
            }
            else{
                return response([ 'data' => null, 'status_code' =>'INVALID','message' => 'Invalid QR Code'], 200);
            }
        }
    }
}
