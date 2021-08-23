@extends('backend.layouts.app')

@section('title', __('Daily Scan Logs'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Daily Scan Logs')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.daily-scan-log.create')"
                    :text="__('All Scan Logs')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:allscanlogs-table />
        </x-slot>
    </x-backend.card>
@endsection
