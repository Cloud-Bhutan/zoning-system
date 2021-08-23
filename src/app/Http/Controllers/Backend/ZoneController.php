<?php

namespace App\Http\Controllers\Backend;
use App\Zone;
use App\Dzongkhag;

use App\Http\Requests\Backend\ZoneRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $zone;

    public function index()
    {
        // $data = Zone::all()->sortBy('name');
        // return view('backend.master.zone.index')->with(compact('data'));
        return view('backend.zone.index');
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
        return view('backend.master.zone.create')->with(compact('dzongkhag'));  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZoneRequest $request)
    {
        $zone =  Zone::create($request->all());
        return redirect()->route('admin.zone.index', $zone)->withFlashSuccess(__('The zone was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Dzongkhag::find($request->paramValue)->zone;
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
        $editDetails = Zone::find($id);
        $dzongkhag = Dzongkhag::all()->sortBy('name');
        return view('backend.master.zone.edit')->with(compact('editDetails','dzongkhag'));
    }

    public function getZoneByDzongkhag(Request $request)
    {
        return Dzongkhag::find($request->paramValue)->zone;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZoneRequest $request,$id)
    { 
        $tableEntity = Zone::find($id);
        $tableEntity->name = $request->name; 
        $tableEntity->dzongkhag_id = $request->dzongkhag_id; 
        $tableEntity->save();
        return redirect()->route('admin.zone.index')->withFlashSuccess(__('The zone was successfully updated.'));
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
