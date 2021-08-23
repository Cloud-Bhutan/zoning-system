<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //
    
    public function householdDetails()
    {
        return $this->hasMany('App\HouseholdDetail');
    }
    
    public function subZone()
    {
        return $this->belongsTo('App\SubZone');
    }
}
