<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HouseholdDetail;
use App\Dzongkhag;
use App\Http\Requests\Backend\HouseholdRequest;

class HouseholdDetailController extends Controller
{
    //

    public function index()
    {
        return view('backend.household-detail.index');
    }

    public function view()
    {
        $data = HouseholdDetail::paginate(20);
        return view('backend.household.view')->with(compact('data'));
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
    public function store(HouseholdRequest $request)
    {
        $zone =  HouseholdDetail::create($request->all());
        return redirect()->route('admin.household.index', $zone)->withFlashSuccess(__('The household was successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request->mobile_no;
    }


    public function search(Request $request)
    {
        $returnPage = "";
        $household = HouseholdDetail::where('mobile_no',$request->mobile_no)->get();
        if(count($household)==1)
        {
            $returnPage ="create";
        }
        else
        {
            $returnPage ="invalid";
        }
        return view('backend.household.'.$returnPage)->with(compact('household'));;

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HouseholdRequest $request,$id)
    { 
        $tableEntity = HouseholdDetail::find($id);

        $tableEntity->name = $request->name; 
        $tableEntity->total_female = $request->total_female; 
        $tableEntity->total_male = $request->total_male;
        $tableEntity->total_above_60 = $request->total_above_60; 
        $tableEntity->total_below_10 = $request->total_below_10; 
        $tableEntity->emergency_contact_no = $request->emergency_contact_no; 
        $tableEntity->nationality = $request->nationality; 

        $tableEntity->save();
        return redirect()->route('admin.household.index')->withFlashSuccess(__('The household was successfully updated.'));
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
