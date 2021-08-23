@extends('backend.layouts.app')

@section('title', __('Dzongkhag Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Dzongkhags Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.dzongkhag.create')"
                    :text="__('Add Dzongkhag')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:dzongkhags-table />
        </x-slot>
    </x-backend.card>
@endsection
