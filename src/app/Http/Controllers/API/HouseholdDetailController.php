<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\HouseholdDetail as HouseholdDetailResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\HouseholdDetail;

class HouseholdDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response([ 'data' => HouseholdDetailResource::collection(HouseholdDetail::all()), 'message' => 'Retrieved successfully'], 200);

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
        $data = $request->all();

        $validator = Validator::make($data, [
            'mobile_no' => 'required',
            'qr_code_id' => 'required',
            'user_id' => 'required',
            'building_id' => 'required',
        ]);
        

        if($validator->fails()){
            return response([ 'data' => null, 'message' => 'Required fields missing'], 200);
        }

        $building = \App\Building::where('building_number', $request->building_id)->first();

        if($building){

            $household = HouseholdDetail::where('mobile_no',$request->mobile_no)->first();


            $existing_qr = HouseholdDetail::where('qr_code_id',$request->qr_code_id)->first();

            if($existing_qr){
                return response([ 'data' => null, 'status_code' => 'ALREADY_USED', 'message' => 'Error adding household, try again'], 200);
            }
            if(!$household){

                $household = new HouseholdDetail;
            }

            $qr = \App\QrCode::find($request->qr_code_id);
            
            if($qr){
                $household->mobile_no = $request->mobile_no;
                $household->building_id = $building->id;
                $household->user_id = $request->user_id;
                $household->qr_code_id = $qr->id;
                $household->name = $request->name;
                $household->total_female = $request->total_female;
                $household->total_male = $request->total_male;
                $household->total_above_60 = $request->total_above_60;
                $household->total_below_10 = $request->total_below_10;
                $household->emergency_contact_no = $request->emergency_contact_no;
                $household->nationality = $request->nationality;
                
                $householdDetail = $household->save();

                if($householdDetail){

                    $qr->status = "active";
                    $qr->save();

                    return response([ 'data' => new HouseholdDetailResource($household), 'status_code' => 'SUCCESS','message' => 'Added household successfully'], 200);
                }
                else{
                    return response([ 'data' => null, 'status_code' => 'FAILED','message' => 'Error adding household, try again'], 200);
                } 
            }
            else{
                return response([ 'data' => null, 'status_code' => 'FAILED','message' => 'Error adding household, try again'], 200);
            }
        }
        else{
            return response([ 'data' => null, 'status_code' => 'FAILED','message' => 'Building not found, please pick building from the map'], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HouseholdDetail  $householdDetail
     * @return \Illuminate\Http\Response
     */
    public function show(HouseholdDetail $householdDetail)
    {
        //
        return $householdDetail;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HouseholdDetail  $householdDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseholdDetail $householdDetail)
    {
        //


        $data = $request->all();

        $validator = Validator::make($data, [
            'mobile_no' => 'required',
            'qr_code_id' => 'required',
            'user_id' => 'required',
            'building_id' => 'required',
        ]);
        
        if($validator->fails()){
            return response([ 'data' => null, 'message' => 'Required fields missing'], 200);
        }

        $householdDetail->mobile_no = $request->mobile_no;
        $householdDetail->building_id = $request->building_id;
        $householdDetail->user_id = $request->user_id;
        $householdDetail->qr_code_id = $request->qr_code_id;
        //$householdDetail->name = $request->name;
        $householdDetail->total_female = $request->total_female;
        $householdDetail->total_male = $request->total_male;
        $householdDetail->total_above_60 = $request->total_above_60;
        $householdDetail->total_below_10 = $request->total_below_10;
        $householdDetail->emergency_contact_no = $request->emergency_contact_no;
        $householdDetail->nationality = $request->nationality;
        
        $household = $householdDetail->save();

        if($household){
            return response([ 'data' => new HouseholdDetailResource($householdDetail), 'message' => 'Updated household successfully'], 200);
        }
        else{
            return response([ 'data' => null, 'message' => 'Error updating household, try again'], 200);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HouseholdDetail  $householdDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseholdDetail $householdDetail)
    {
        //
    }
    
}
