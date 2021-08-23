@extends('backend.layouts.app')

@section('title', __('Search Household'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Search Household')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Back')" />
        </x-slot>

        {{-- <x-slot name="body">
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="ccmonth">Dzongkhag/Thromde</label>
                    <select class="form-control js-dzongkhag-ajax" id="dzongkhag-select">
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label for="ccyear">Zone</label>
                    <select class="form-control" id="ccyear">
                        
                    </select>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="ccyear">Sub Zone</label>
                        <select class="form-control" id="ccyear">
                            
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-2">
                    <label for="ccmonth">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="17420558">
                </div>
                <div class="form-group col-sm-2">
                    <label for="ccmonth">Emergency Contact Number</label>
                    <input type="text" class="form-control" name="emergency_contact_no" id="emergency_contact_no" placeholder="17420558">
                </div>
                <div class="form-group col-sm-4">
                    <label for="ccyear">QR Code</label>
                    <input type="text" class="form-control" name="qr_code" id="qr_code" placeholder="4b8e1c17-f5b7-41c3-93fc-cc92f6b25c08">
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cvv">Building Number</label>
                        <input type="text" class="form-control" name="building_number" id="building_number" placeholder="123">
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            
        </x-slot> --}}
        <x-slot name="body">
            <livewire:search-household-details />
        </x-slot>
        
    </x-backend.card>
@endsection
@push('after-scripts')
    <script>
        $(document).ready(function(){
            $('#dzongkhag-select').select2({
                placeholder: 'Select Dzongkhag',
                ajax: {
                    url: "/api/dzongkhags",
                    dataType: 'json',
                    processResults: function (data) {
                        return {
                        results:  $.map(data.data, function (item) {
                            return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        }
                    }
                }
            });
            $('#dzongkhag-select').on('select2:select', function(e){
                alert("hi");
            });
        });
        
    </script>
@endpush
