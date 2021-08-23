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
                :href="route('admin.subzone.create')"
                :text="__('Create Sub one')"
            />
        </x-slot>
        <x-slot name="body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sub Zone</th>
                        <th>Zone</th>
                        <th>Dzongkhag</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{$row['name']}}</td>
                            <td>
                                @if($row->zone->name)
                                {{$row->zone->name}}
                                @endif
                            </td>
                            <td>
                             @if($row->zone->dzongkhag->name)
                                {{$row->zone->dzongkhag->name}}
                            @endif
                            </td>
                            <td>
                            <a class="btn btn-success" href="{{route('admin.subzone.edit',$row->id)}}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
