@inject('model', '\App\Dzongkhag')
@extends('backend.layouts.app')
@section('title', __('Create Zone'))
@section('content')
        <x-backend.card>
            <x-slot name="header">
                @lang('Visit Log Report')
            </x-slot>
            <x-slot name="body">
                <div>
                    <div class="form-group row col-lg-6 col-md-6 float-left">
                        <label for="name" class="col-md-4 col-lg-4 col-form-label">@lang('From Date')</label>
                        <div class="col-md-8 col-lg-8">
                            <input type="text" autocomplete="off" class="form-control datetimepicker7" id="startDateTime">
                        </div>
                    </div>
                    <div class="form-group row col-lg-6 col-md-6 float-left">
                        <label for="name" class="col-md-4 col-lg-4 col-form-label">@lang('To Date')</label>
                        <div class="col-md-8 col-lg-8">
                            <input type="text" autocomplete="off" class="form-control datetimepicker7" id="endDateTime">
                        </div>
                    </div>
                    <div class="form-group row col-lg-6 col-md-6 float-left">
                        <label for="name" class="col-md-4 col-lg-4 col-form-label">@lang('Report Type')</label>
                        <div class="col-md-8 col-lg-8">
                            <select name="reportType" class="form-control" id="reportType">
                                <option value="DETAIL_REPORT">Detail Report</option>
                                <option value="STATISTICS_REPORT">Statistics Report</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row col-lg-6 col-md-6 float-left">
                        <label for="name" class="col-md-4 col-lg-4 col-form-label">@lang('Dzongkhag')</label>
                        <div class="col-md-8 col-lg-8">
                            <select name="dzongkhag_id" class="form-control" onchange="getDropDrown('ZONE_LIST','zone_id',this.value)" id="dzongkhagId">
                                <option value="0">Select Dzongkhag</option>
                                @foreach ($dzongkhag as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row col-lg-6 col-md-6 float-left">
                        <label for="name" class="col-md-4 col-lg-4 col-form-label">@lang('Zone')</label>
                        <div class="col-md-8 col-lg-8">
                            <select name="zone_id" class="form-control" onchange="getDropDrown('SUB_ZONE_LIST','sub_zone_id',this.value)" id="zone_id">
                                <option value="0">Select Zone</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row col-lg-6 col-md-6 float-left">
                        <label for="name" class="col-md-4 col-lg-4 col-form-label">@lang('Sub Zone')</label>
                        <div class="col-md-8 col-lg-8">
                            <select name="sub_zone_id" class="form-control" onchange="getDropDrown('BUILDING_LIST','building_no',this.value)" id="sub_zone_id">
                                <option value="0">Select Sub Zone</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row col-lg-6 col-md-6 float-left">
                        <label for="name" class="col-md-4 col-lg-4 col-form-label">@lang('Buiding No.')</label>
                        <div class="col-md-8 col-lg-8">
                            <select name="building_no" class="form-control" id="building_no">
                                <option value="0">Select Building No.</option>
                            </select>
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="text-center">
                    <button class="btn btn-sm btn-primary col-2" onclick="generateReport()" type="button">@lang('Search')</button>
                </div>
            </x-slot>
        </x-backend.card>
        
        <x-backend.card>
            <x-slot name="body">
                <div id="generatedReportResult"></div>
            </x-slot>
        </x-backend.card>
        
@endsection
 


@push('after-scripts')
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>                       
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script>
            $('.datetimepicker7').datetimepicker({    
                 
                useCurrent: false,
                format:'DD/MM/YYYY HH:mm:ss'
            });
    </script>

    <script>
        function getDropDrown(dropDownType,targetId,paramValue)
        {
            $("#"+targetId).empty();
            var url = "";
            if(dropDownType=='ZONE_LIST')
            {
                $("#"+targetId).append('<option value="0">Select Zone</option>');
                url = "{{route('admin.zone.getZoneByDzongkhag')}}";
            }
            else if(dropDownType=='SUB_ZONE_LIST')
            {
                $("#"+targetId).append('<option value="0">Select Sub Zone</option>');
                url = "{{route('admin.subzone.getSubZoneList')}}";
            }
            else if(dropDownType=='BUILDING_LIST')
            {
                $("#"+targetId).append('<option value="0">Select Building No.</option>');
                url = "{{route('admin.subzone.getBuildingNo')}}";
            }
            

            jQuery.ajax({
                url: url,
                method: 'get',
                data: {
                paramValue: paramValue
                },
                success: function(result){
                    for(var i=0;i<result.length;i++){
                        $("#"+targetId).append('<option value="'+result[i].id+'">'+result[i].name+'</option>');

                    }
                }
            });
        }

        function generateReport()
        {
            var startDateTime = "";
            var endDateTime = "";
            $("#generatedReportResult").clear;
            if($("#startDateTime").val()!="")
            {

                var dateArray = $("#startDateTime").val().split("/");
                var timeArray = dateArray[2].split(" ");
                startDateTime = timeArray[0]+"-"+dateArray[1]+"-"+dateArray[0]+" "+timeArray[1];

                dateArray = $("#endDateTime").val().split("/");
                timeArray = dateArray[2].split(" ");
                endDateTime = timeArray[0]+"-"+dateArray[1]+"-"+dateArray[0]+" "+timeArray[1];
            } 

            jQuery.ajax({
                url: "{{route('admin.report.generate')}}",
                method: 'get',
                data: {
                startDateTime   : startDateTime,
                endDateTime     : endDateTime,
                dzongkhagId     : $("#dzongkhagId").val(),
                zoneId          : $("#zone_id").val(),
                subZoneId       : $("#sub_zone_id").val(),
                buildingNo      : $("#building_no").val(),
                reportType      : $("#reportType").val()
                
                },
                success: function(result){
                    $("#generatedReportResult").html(result);
                }
            });
        }
    </script>
@endpush
