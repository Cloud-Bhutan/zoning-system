
@extends('backend.layouts.app')
@section('title', __('Generate QR Code'))
@section('content')
    <x-forms.post :action="route('admin.qr-code.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Generate QR (Quick Response) Code')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.qr-code.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <div >
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                        <div class="col-md-10">
                            <input type="text" name="quantity" class="form-control" placeholder="{{ __('QR Quantity') }}" value="{{ old('quantity') }}" maxlength="100" required />
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="text-center">
                    <button class="btn btn-sm btn-primary col-lg-2" type="button">@lang('Generate QR')</button>
                </div>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
