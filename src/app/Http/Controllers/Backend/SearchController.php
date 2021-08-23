<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function getSearchHousehold(Request $request){

        

        
        return view('backend.household-detail.search');



    }
}
