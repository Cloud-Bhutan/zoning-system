<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubZone extends Model
{
    protected $fillable = [
        'name',
        'zone_id'
    ];

    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }

    public function buidlings()
    {
        return $this->hasMany('App\Building');
    }
}
