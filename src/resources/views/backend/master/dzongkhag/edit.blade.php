@extends('backend.layouts.app')
@section('title', __('Create Dzongkhag'))
@section('content')

    <x-forms.post :action="route('admin.dzongkhag.update',[$editDetails->id])">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Dzongkhag')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.dzongkhag.index')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{$editDetails->name}}" maxlength="100" required />
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="text-center">
                    <button class="btn btn-sm btn-primary col-lg-2 type="submit">@lang('Update Zone')</button>
                </div>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
