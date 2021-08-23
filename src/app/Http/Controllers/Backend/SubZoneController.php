<?php

namespace App\Http\Controllers\Backend;

use App\SubZone;
use App\Zone;
use App\Dzongkhag;
use App\Building;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\SubZoneResquest;

class SubZoneController extends Controller
{
    //

    public function index()
    {
        $data = SubZone::all()->sortBy('name');
        return view('backend.sub-zone.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dzongkhag = Dzongkhag::all()->sortBy('name');
        return view('backend.master.subzone.create')->with(compact('dzongkhag'));  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubZoneResquest $request)
    {
        $result =  SubZone::create($request->all());
        return redirect()->route('admin.subzone.index', $result)->withFlashSuccess(__('The sub zone was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function getSubZoneList(Request $request)
    {
         return SubZone::where('zone_id',$request->paramValue)->get();
    }
    
    public function getBuildingNo(Request $request)
    {

         return Building::where('sub_zone_id',$request->paramValue)->select(
            'building_number AS name',
            'id AS id'
        )->get();
    }

    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editDetails = SubZone::find($id);
        $zoneList = Zone::where('dzongkhag_id',$editDetails->zone->dzongkhag_id)->get();
        $dzongkhag = Dzongkhag::all()->sortBy('name');
        return view('backend.master.subzone.edit')->with(compact('editDetails','dzongkhag','zoneList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubZoneResquest $request,$id)
    { 
        $tableEntity = SubZone::find($id);
        $tableEntity->name = $request->name; 
        $tableEntity->zone_id = $request->zone_id; 
        $tableEntity->save();
        return redirect()->route('admin.subzone.index')->withFlashSuccess(__('The sub zone was successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
