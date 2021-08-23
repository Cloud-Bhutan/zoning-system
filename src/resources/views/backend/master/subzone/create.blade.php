@inject('model', '\App\Dzongkhag')
@extends('backend.layouts.app')
@section('title', __('Create Zone'))
@section('content')
    <x-forms.post :action="route('admin.subzone.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Zone')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.subzone.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Dzongkhag')</label>
                        <div class="col-md-10">
                            <select id="dzongkhagId"  class="form-control" onchange="getZoneList(this.value)" required x-on:change="userType = $event.target.value">
                                <option value="">Select Dzongkhag</option>
                                @foreach ($dzongkhag as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Zone')</label>
                        <div class="col-md-10">
                            <select name="zone_id" class="form-control" id="zone_id" required x-on:change="userType = $event.target.value">
                                <option value="">Select Zone</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="text-center">
                    <button class="btn btn-sm btn-primary col-lg-2" type="submit">@lang('Create Sub Zone')</button>
                </div>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
    <script>
        function getZoneList(dzongkhagId)
        {
            $("#zone_id").empty();
            $("#zone_id").append('<option value="">Select Zone</option>');
            jQuery.ajax({
                url: "{{route('admin.zone.getZoneByDzongkhag')}}",
                method: 'get',
                data: {
                dzongkhagId: dzongkhagId
                },
                success: function(result){
                    $(".newRows").remove();
                    for(var i=0;i<result.length;i++){
                        $("#zone_id").append('<option value="'+result[i].id+'">'+result[i].name+'</option>');

                    }
                }
            });
        }
    </script>
@endsection
