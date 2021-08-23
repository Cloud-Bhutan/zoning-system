<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use DB;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(){

        $household = \App\HouseholdDetail::all()->count();
        $buildings = \App\Building::all()->count();
        $zones = \App\Zone::all()->count();
        $subZones = \App\SubZone::all()->count();
        $dzongkhags = \App\Dzongkhag::all();
        $scans = \App\DailyScanLog::all()->count();


        $dzongkhagLabel = array();
        $householdByDzongkhag = array();
        $buildingsByDzongkhag = array();
        $zonesByDzongkhag = array();

        // return $householdCount = DB::table('dzongkhags')
        //                     ->join('zones', 'dzongkhags.id', '=', 'zones.dzongkhag_id')
        //                     ->join('sub_zones', 'zones.id', '=', 'sub_zones.zone_id')
        //                     ->join('buildings', 'sub_zones.id', '=', 'buildings.sub_zone_id')
        //                     ->join('household_details','buildings.id', '=', 'household_details.building_id')
        //                     ->select('dzongkhags.name as dzName', 
                                        
        //                             )
        //                     ->groupBy('dzongkhags.id')
        //                     ->get();


        foreach($dzongkhags as $dz){
            
            $dzongkhagLabel[] = $dz->name;
            //$householdByDzongkhag[];
            $householdData = DB::table('dzongkhags')
                            ->join('zones', 'dzongkhags.id', '=', 'zones.dzongkhag_id')
                            ->join('sub_zones', 'zones.id', '=', 'sub_zones.zone_id')
                            ->join('buildings', 'sub_zones.id', '=', 'buildings.sub_zone_id')
                            ->join('household_details','buildings.id', '=', 'household_details.building_id')
                            ->select('dzongkhags.name as dzName', 
                                    DB::raw("(SUM(household_details.total_male)) as totalMale"),
                                    DB::raw("(SUM(household_details.total_female)) as totalFemale"),
                                    DB::raw("(SUM(household_details.total_below_10)) as totalBelow10"),
                                    DB::raw("(SUM(household_details.total_above_60)) as totalAbove60"),
                                    )
                            ->groupBy('dzongkhags.id')
                            ->get();

            $dzzones = \App\Zone::select('id')->where('dzongkhag_id',$dz->id)->get();
            $dzsubZones = \App\SubZone::select('id')->whereIn('zone_id', $dzzones)->get();
            $zonesByDzongkhag[] = $dzsubZones->count();
            $dzbuildings = \App\Building::select('id')->whereIn('sub_zone_id', $dzsubZones)->get();
            
            $buildingsByDzongkhag[] = $dzbuildings->count();
            $households = \App\HouseholdDetail::whereIn('building_id', $dzbuildings)->count();
            $householdByDzongkhag[] = $households;
            // $totalMale = \App\HouseholdDetail::whereIn('building_id', $dzbuildings)->sum('total_male');
            // $totalFemale = \App\HouseholdDetail::whereIn('building_id', $dzbuildings)->sum('total_female');
            // $totalMaleByDzongkhag[] = $totalMale;
            // $totalFemaleByDzongkhag[] = $totalFemale;

            // $below10 = \App\HouseholdDetail::whereIn('building_id', $dzbuildings)->sum('total_below_10');
            // $above60 = \App\HouseholdDetail::whereIn('building_id', $dzbuildings)->sum('total_above_60');
            // $below10ByDzongkhag[] = $below10;
            // $above60ByDzongkhag[] = $above60;
            // $totalPolupationByDzongkhag[] = $totalMale + $totalFemale
        }
        

        $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels($dzongkhagLabel)
        ->datasets([
            [
                "label" => "Household",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $householdByDzongkhag,
            ],
            // ,
            [
                "label" => "Buildings",
                'backgroundColor' => "rgba(38, 185, 154, 0.6)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $buildingsByDzongkhag,
            ]
        ])
        ->options([]);
        
        $householdData = DB::table('dzongkhags')
                            ->join('zones', 'dzongkhags.id', '=', 'zones.dzongkhag_id')
                            ->join('sub_zones', 'zones.id', '=', 'sub_zones.zone_id')
                            ->join('buildings', 'sub_zones.id', '=', 'buildings.sub_zone_id')
                            ->join('household_details','buildings.id', '=', 'household_details.building_id')
                            ->select('dzongkhags.name as dzName', 
                                    DB::raw("(SUM(household_details.total_male)) as totalMale"),
                                    DB::raw("(SUM(household_details.total_female)) as totalFemale"),
                                    DB::raw("(SUM(household_details.total_below_10)) as totalBelow10"),
                                    DB::raw("(SUM(household_details.total_above_60)) as totalAbove60"),
                                    )
                            ->groupBy('dzongkhags.id')
                            ->get();
        
        // return $householdData;

        $label = $householdData->map(function ($item, $key){
            return $item->dzName;
        });

    
        $totalPopulationByDzongkhag = $householdData->map(function ($item, $key){
            return (int)$item->totalMale + (int)$item->totalFemale;
        });

        //return $totalPopulationByDzongkhag;

        $totalMaleByDzongkhag = $householdData->map(function ($item, $key){
            return (int)$item->totalMale;
        });

        $totalFemaleByDzongkhag = $householdData->map(function ($item, $key){
            return (int)$item->totalFemale;
        });

        $above60ByDzongkhag = $householdData->map(function ($item, $key){
            return (int)$item->totalAbove60;
        });

        $below10ByDzongkhag = $householdData->map(function ($item, $key){
            return (int)$item->totalBelow10;
        });

        

        //return $below10ByDzongkhag;

        $dzongkhagPopulation = app()->chartjs
        ->name('populationChart')
        ->type('bar')
        ->size(['width' => 400, 'height' => 200])
        ->labels($label->all())
        ->datasets([
            [
                "label" => "Total Population",
                'backgroundColor' => "rgba(255,0,0,0.6)",
                'data' => $totalPopulationByDzongkhag->all(),
            ],
            [
                "label" => "Male",
                'backgroundColor' => "rgba(38, 185, 154, 0.6)",
                'borderColor' => "rgba(0,255,255, 0.7)",
                'data' => $totalMaleByDzongkhag->all(),
            ],
            [
                "label" => "Female",
                'backgroundColor' => "rgba(0,255,0,0.5)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                'data' => $totalFemaleByDzongkhag->all(),
            ],
            [
                "label" => "Below 10",
                'backgroundColor' => "rgba(0,0,255,0.6)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $below10ByDzongkhag->all(),
            ],
            [
                "label" => "Above 60",
                'backgroundColor' => "rgba(50, 31, 219,0.6)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $above60ByDzongkhag->all(),
            ],
        ])
        ->options([]);


        return view('backend.dashboard', compact('chartjs','dzongkhagPopulation', 'household','zones','subZones','buildings', 'scans'));
    }
}
