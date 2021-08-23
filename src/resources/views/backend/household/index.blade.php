
@extends('backend.layouts.app')
@section('title', __('Generate QR Code'))
@section('content')
    <x-forms.post :action="route('admin.qr-code.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Household Registration Form')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.qr-code.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <div >
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Mobile No.')</label>
                        <div class="col-md-10">
                            <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="{{ __('Mobile No.') }}" value="{{ old('mobile_no') }}" maxlength="100" required />
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="text-center">
                    <button class="btn btn-sm btn-primary col-lg-2" onclick="searchHousehold()" type="button">@lang('Search')</button>
                </div>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
    <div id="searchResult"></div>
@endsection

@push('after-scripts')
    <script>
        function searchHousehold()
        {
            $("#searchResult").empty();
            jQuery.ajax({
                url: "{{route('admin.household.search')}}",
                method: 'get',
                data: {
                mobile_no   : $("#mobile_no").val()
                },
                success: function(result){
                    $("#searchResult").html(result);
                     
                }
            });
        }
    </script>
@endpush
