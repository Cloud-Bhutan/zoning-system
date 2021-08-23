<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QrCode extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

       // $household_detail_id = \App\HouseholdDetail::where('qr_code_id', $request->id)->first();
        
        return parent::toArray($request);
    }
}
