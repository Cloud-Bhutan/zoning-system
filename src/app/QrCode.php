<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;


class QrCode extends Model
{

    
    //
    use Uuids;

    protected $fillable = [
        'uuid', 'status',
    ];

    public function householdDetail()
    {
        return $this->hasOne('App\HouseholdDetail');
    }
}
