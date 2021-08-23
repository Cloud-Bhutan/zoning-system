@extends('backend.layouts.app')
@section('title', __('Zone'))
@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Zone')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.zone.create')"
                :text="__('Create Zone')"
            />
        </x-slot>
        <x-slot name="body">
            {{-- <livewire:zone-table /> --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Dzongkhag</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{$row['name']}}</td>
                            <td>{{$row->dzongkhag->name}}</td>
                            <td>
                            <a class="btn btn-success" href="{{route('admin.zone.edit',$row->id)}}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
