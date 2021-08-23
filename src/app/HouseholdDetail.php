<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseholdDetail extends Model
{
    public function qrCode()
    {
        return $this->belongsTo('App\QrCode');
    }

    public function building()
    {
        return $this->belongsTo('App\Building');
    }

    public function user()
    {
        return $this->belongsTo('App\Domains\Auth\Models\User');
    }
    
    public function allVisitLogs()
    {
        return $this->hasMany('App\AllVisitLog');
    }

    public function dailyScanLogs()
    {
        return $this->hasMany('App\AllScanLog');
    }

    public function allScanLogs()
    {
        return $this->hasMany('App\AllScanLog');
    }
}
