<?php

namespace App\Http\Controllers\Backend;

use App\AllScanLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllScanLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.all-scan-log.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AllScanLog  $allScanLog
     * @return \Illuminate\Http\Response
     */
    public function show(AllScanLog $allScanLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AllScanLog  $allScanLog
     * @return \Illuminate\Http\Response
     */
    public function edit(AllScanLog $allScanLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AllScanLog  $allScanLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllScanLog $allScanLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AllScanLog  $allScanLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(AllScanLog $allScanLog)
    {
        //
    }
}
