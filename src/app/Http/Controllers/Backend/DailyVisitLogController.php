<?php

namespace App\Http\Controllers\Backend;

use App\DailyVisitLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DailyVisitLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DailyVisitLog::all()->sortBy('created_at');
        return view('backend.dailyLog.index')->with(compact('data'));
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
     * @param  \App\DailyVisitLog  $dailyVisitLog
     * @return \Illuminate\Http\Response
     */
    public function show(DailyVisitLog $dailyVisitLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DailyVisitLog  $dailyVisitLog
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyVisitLog $dailyVisitLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DailyVisitLog  $dailyVisitLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyVisitLog $dailyVisitLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DailyVisitLog  $dailyVisitLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyVisitLog $dailyVisitLog)
    {
        //
    }
}
