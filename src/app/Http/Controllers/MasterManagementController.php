<?php

namespace App\Http\Controllers;
use App\Zone;
use App\Dzongkhag;

use Illuminate\Http\Request;

class MasterManagementController extends Controller
{
    //


    public function index(Request $request) {
        $tableDtls = "";
        $title = "";
        $tableType = $request->tableType;
        $masterType = $request->masterType;
        $masterMappingCol = "";
        
        
        
        if($request->masterType=='zone')
        {
            $tableDtls = Zone::all()->sortBy('name');
            $title = "Zone";
        }
        else if($request->masterType=='dzongkhag')
        {
            $tableDtls = Dzongkhag::all()->sortBy('name');
            $title = "Dzongkhag";
        }

        return view('masters.index')
        ->with(compact('tableDtls','title','tableType','masterType','masterMappingCol'));    
    }



    public function addMaster(Request $request) {
        $tableDtls = "";
        $title = "";
        $tableType = $request->tableType;
        $masterType = $request->masterType;
        $masterDataList = null;
        $masterMappingCol = "";
        if($masterType=='zone')
        {
            $title = "Agency Type";
            $masterDataList = Dzongkhag::all()->sortBy('name');
            $masterMappingCol = "Dzongkhag";
            $title = "Create New Zone";
        }
        else if($request->masterType=='locality')
        {
            $masterDataList = Locations::all()->sortBy('name');
            $masterMappingCol = "Location";
            $title = "Locality";
        }
        else if($request->masterType=='dzongkhag')
        {
            $masterDataList = Dzongkhag::all()->sortBy('name');
            $masterMappingCol = "Dzongkhag";
            $title = "Dzongkhag";
        }
        
        return view('masters.create')
        ->with(compact('tableDtls','title','tableType','masterType','masterMappingCol','masterDataList'));
    }

    public function store(Request $request)
    { 
        $tableDtls = "";
        $title = "";
        $tableType = $request->tableType;
        $masterType = $request->masterType;
        $tableEntity = null;
        if($masterType=='dzongkhag')
        {


            
            $tableEntity = new Dzongkhag;


        }
        else if($request->masterType=='zone')
        {
            $tableEntity = new Zone;
            $tableEntity->dzongkhag_id = $request->master_mapping_id; 
        }
        $tableEntity->name = $request->name; 
        
        $tableEntity->save();
        return redirect()->route('masterManagement',[$tableType,$masterType]);
    }

    public function update(Request $request)
    { 
        $tableDtls = "";
        $title = "";
        $tableType = $request->tableType;
        $masterType = $request->masterType;
        $tableEntity = null;
        if($masterType=='dzongkhag')
        {
            $tableEntity = Dzongkhag::find($request->id);
        }
        else if($request->masterType=='zone')
        {
            $tableEntity = Zone::find($request->id);
            $tableEntity->dzongkhag_id = $request->master_mapping_id; 
        }
        $tableEntity->name = $request->name; 
        $tableEntity->save();
        return redirect()->route('masterManagement',[$tableType,$masterType]);
    }
    
    


    public function edit(Request $request) {
        $tableDtls = "";
        $title = "";
        $tableType = $request->tableType;
        $masterType = $request->masterType;
        $masterDataList = null;
        $masterMappingCol = "";
        $editDetails = "";
       
        if($tableType == 'MASTER_TABLE')
        {
            if($masterType=='dzongkhag')
            {
                $title = "Dzongkhag";
                $editDetails = Dzongkhag::find($request->id);
            }
            
        }
        else if($tableType == "SUB_MASTER_TABLE")
        {
            if($request->masterType=='zone')
            {
                $editDetails = Zone::find($request->id);
                $masterDataList = Dzongkhag::all()->sortBy('name');
                $masterMappingCol = "Dzongkhag";
                $title = "Update Zone";
            }
        }
        
        return view('masters.edit')
        ->with(compact('tableDtls','title','tableType','masterType','masterMappingCol','masterDataList','editDetails'));
    }

}
