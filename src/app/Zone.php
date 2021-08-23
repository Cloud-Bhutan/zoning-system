<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
        'name',
        'dzongkhag_id'
    ];

    public function dzongkhag()
    {
        return $this->belongsTo('App\Dzongkhag');
    }

    public function subZones()
    {
        return $this->hasMany('App\SubZone');
    }
}
