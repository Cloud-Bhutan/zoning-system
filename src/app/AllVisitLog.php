<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllVisitLog extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function householdDetail()
    {
        return $this->belongsTo('App\HouseholdDetail');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
    

}
