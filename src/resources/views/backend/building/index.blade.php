@extends('backend.layouts.app')

@section('title', __('Building Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Building Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.building.create')"
                    :text="__('Building Household')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:buildings-table />
        </x-slot>
    </x-backend.card>
@endsection
