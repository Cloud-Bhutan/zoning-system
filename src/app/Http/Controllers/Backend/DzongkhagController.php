<?php

namespace App\Http\Controllers\Backend;

use App\Dzongkhag;
use App\Http\Requests\Backend\DzongkhagRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DzongkhagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $dzongkhag;

    public function index()
    {
        //
        //$data = Dzongkhag::all()->sortBy('name');
        // return view('backend.master.dzongkhag.index')->with(compact('data'));
        return view('backend.dzongkhag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dzongkhag.create');  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DzongkhagRequest $request)
    {
        $dz =  Dzongkhag::create($request->all());
        return redirect()->route('admin.dzongkhag.index', $dz)->withFlashSuccess(__('The dzongkhag was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $editDetails = Dzongkhag::find($id);
        return view('backend.master.dzongkhag.edit')->with(compact('editDetails'));

    }

    // public function getZoneList(Request $request)
    // {
    //     return $editDetails = Dzongkhag::find($request->dzongkhagId);
    //     //return view('backend.master.dzongkhag.edit')->with(compact('editDetails'));

    // }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DzongkhagRequest $request, $id)
    {
        $tableEntity = Dzongkhag::find($id);
        $tableEntity->name = $request->name; 
        $tableEntity->save();
       // $this->dzongkhag->update($id, $request->validated());
        return redirect()->route('admin.dzongkhag.index')->withFlashSuccess(__('The dzongkhag was successfully updated.'));
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
