<?php

namespace App\Http\Controllers;
use App\Zone;
use App\Dzongkhag;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getDzongkhagList()
    {
        $tableDtls = Dzongkhag::all()->sortBy('name');
        return $tableDtls;
    }
}
