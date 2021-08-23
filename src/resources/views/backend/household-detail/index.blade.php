@extends('backend.layouts.app')

@section('title', __('Household Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Household Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.household-detail.create')"
                    :text="__('Add Household')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:household-details-table />
        </x-slot>
    </x-backend.card>
@endsection
