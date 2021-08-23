<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dzongkhag;
use DB;

class ReportController extends Controller
{

    public function index()
    {
        $dzongkhag = Dzongkhag::all()->sortBy('name');
        return view('backend.report.index')->with(compact('dzongkhag'));
    }

    public function houseHoldReport()
    {
        $dzongkhag = Dzongkhag::all()->sortBy('name');
        return view('backend.report.houseHoldReport')->with(compact('dzongkhag'));
    }

    public function store(Request $request)
    {
        
    }

    public function generate(Request $request)
    {
        
        $allvisitLog = "";
        $reportType = $request->reportType;
        if($request->reportType == "DETAIL_REPORT")
        {
            $allvisitLog = DB::table('all_visit_logs')
                ->leftJoin('household_details', 'all_visit_logs.household_detail_id', '=', 'household_details.id')
                ->leftJoin('buildings', 'household_details.building_id', '=', 'buildings.id')
                ->leftJoin('sub_zones', 'buildings.sub_zone_id', '=', 'sub_zones.id')
                ->leftJoin('zones', 'sub_zones.zone_id', '=', 'zones.id')
                ->leftJoin('dzongkhags', 'zones.dzongkhag_id', '=', 'dzongkhags.id')
                ->leftJoin('shops', 'all_visit_logs.shop_id', '=', 'shops.id')
                ->select(
                    'dzongkhags.name AS dzongkhag',
                    'zones.name AS zone',
                    'sub_zones.name AS subZone',
                    'buildings.building_number',
                    'household_details.qr_code_id',
                    'all_visit_logs.created_at',
                    'shops.name AS shopName'
                );
            if($request->startDateTime!="")
            {
                $allvisitLog = $allvisitLog->where('all_visit_logs.created_at', '>=',$request->startDateTime)->
                                            where('all_visit_logs.created_at', '<=',$request->endDateTime);
            }
            if($request->dzongkhagId!="0")
            {
                $allvisitLog = $allvisitLog->where('dzongkhags.id', '=',$request->dzongkhagId);
            }
            if($request->zoneId!="0")
            {
                $allvisitLog = $allvisitLog->where('zones.id', '=',$request->zoneId);
            }
            if($request->subZoneId!="0")
            {
                $allvisitLog = $allvisitLog->where('sub_zones.id', '=',$request->subZoneId);
            }
            if($request->buildingNo!="0")
            {
                $allvisitLog = $allvisitLog->where('buildings.id', '=',$request->buildingNo);
            }
            $allvisitLog = $allvisitLog->get();
            
        }
        else
        {
            $allvisitLog = DB::table('all_visit_logs')
                ->leftJoin('household_details', 'all_visit_logs.household_detail_id', '=', 'household_details.id')
                ->leftJoin('buildings', 'household_details.building_id', '=', 'buildings.id')
                ->leftJoin('sub_zones', 'buildings.sub_zone_id', '=', 'sub_zones.id')
                ->leftJoin('zones', 'sub_zones.zone_id', '=', 'zones.id')
                ->leftJoin('dzongkhags', 'zones.dzongkhag_id', '=', 'dzongkhags.id')
                ->select(DB::raw("
                    dzongkhags.name AS dzongkhag,
                    zones.name AS zone,
                    sub_zones.name AS subZone,
                    count(*)totalVisit"
            ));
            if($request->startDateTime!="")
            {
                $allvisitLog = $allvisitLog->where('all_visit_logs.created_at', '>=',$request->startDateTime)->
                                            where('all_visit_logs.created_at', '<=',$request->endDateTime);
            }
            if($request->dzongkhagId!="0")
            {
                $allvisitLog = $allvisitLog->where('dzongkhags.id', '=',$request->dzongkhagId);
            }
            if($request->zoneId!="0")
            {
                $allvisitLog = $allvisitLog->where('zones.id', '=',$request->zoneId);
            }
            if($request->subZoneId!="0")
            {
                $allvisitLog = $allvisitLog->where('sub_zones.id', '=',$request->subZoneId);
            }
            if($request->buildingNo!="0")
            {
                $allvisitLog = $allvisitLog->where('buildings.id', '=',$request->buildingNo);
            }
            $allvisitLog = $allvisitLog->groupBy('dzongkhags.name','zones.name','sub_zones.name')->get();
        }
        return view('backend.report.show')->with(compact('allvisitLog','reportType'));
    }

    public function houseHoldReportGenerate(Request $request)
    {
        $allvisitLog = "";
        $reportType = $request->reportType;
        if($request->reportType == "DETAIL_REPORT")
        {
            $allvisitLog = DB::table('household_details')
            ->leftJoin('buildings', 'household_details.building_id', '=', 'buildings.id')
            ->leftJoin('sub_zones', 'buildings.sub_zone_id', '=', 'sub_zones.id')
            ->leftJoin('zones', 'sub_zones.zone_id', '=', 'zones.id')
            ->leftJoin('dzongkhags', 'zones.dzongkhag_id', '=', 'dzongkhags.id')
            ->select(
                'dzongkhags.name AS dzongkhag',
                'zones.name AS zone',
                'sub_zones.name AS subZone',
                'buildings.building_number',
                'household_details.qr_code_id',
                'household_details.name',
                'household_details.mobile_no',
                'household_details.total_female',
                'household_details.total_male',
                'household_details.total_above_60',
                'household_details.total_below_10',
                'household_details.emergency_contact_no'
            );

            if($request->dzongkhagId!="0")
            {
                $allvisitLog = $allvisitLog->where('dzongkhags.id', '=',$request->dzongkhagId);
            }
            if($request->zoneId!="0")
            {
                $allvisitLog = $allvisitLog->where('zones.id', '=',$request->zoneId);
            }
            if($request->subZoneId!="0")
            {
                $allvisitLog = $allvisitLog->where('sub_zones.id', '=',$request->subZoneId);
            }
            if($request->buildingNo!="0")
            {
                $allvisitLog = $allvisitLog->where('buildings.id', '=',$request->buildingNo);
            }
            $allvisitLog = $allvisitLog->get();
        }
        else
        {
             $allvisitLog = DB::table('household_details')
            ->leftJoin('buildings', 'household_details.building_id', '=', 'buildings.id')
            ->leftJoin('sub_zones', 'buildings.sub_zone_id', '=', 'sub_zones.id')
            ->leftJoin('zones', 'sub_zones.zone_id', '=', 'zones.id')
            ->leftJoin('dzongkhags', 'zones.dzongkhag_id', '=', 'dzongkhags.id')
            ->select(DB::raw("
                dzongkhags.name AS dzongkhag,
                zones.name AS zone,
                sub_zones.name AS subZone,
                sum(household_details.total_female)totalFemale,
                sum(household_details.total_male)totalMale,
                sum(household_details.total_below_10)totalBelow,
                sum(household_details.total_above_60)totalAbove"
            ));

            if($request->dzongkhagId!="0")
            {
                $allvisitLog = $allvisitLog->where('dzongkhags.id', '=',$request->dzongkhagId);
            }
            if($request->zoneId!="0")
            {
                $allvisitLog = $allvisitLog->where('zones.id', '=',$request->zoneId);
            }
            if($request->subZoneId!="0")
            {
                $allvisitLog = $allvisitLog->where('sub_zones.id', '=',$request->subZoneId);
            }
            if($request->buildingNo!="0")
            {
                $allvisitLog = $allvisitLog->where('buildings.id', '=',$request->buildingNo);
            }
            $allvisitLog = $allvisitLog->groupBy('dzongkhags.name','zones.name','sub_zones.name')->get();

        }
        return view('backend.report.showHouseHoldReport')->with(compact('allvisitLog','reportType'));
    }
    
}