<?php

namespace App\Http\Controllers\Backend;

use App\DailyScanLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DailyScanLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.daily-scan-log.index');
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
     * @param  \App\DailyScanLog  $dailyScanLog
     * @return \Illuminate\Http\Response
     */
    public function show(DailyScanLog $dailyScanLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DailyScanLog  $dailyScanLog
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyScanLog $dailyScanLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DailyScanLog  $dailyScanLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyScanLog $dailyScanLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DailyScanLog  $dailyScanLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyScanLog $dailyScanLog)
    {
        //
    }
}
