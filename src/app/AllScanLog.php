<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllScanLog extends Model
{
    //

    public function householdDetail()
    {
        return $this->belongsTo('App\HouseholdDetail');
    }

    public function user()
    {
        return $this->belongsTo('App\Domains\Auth\Models\User');
    }
}
