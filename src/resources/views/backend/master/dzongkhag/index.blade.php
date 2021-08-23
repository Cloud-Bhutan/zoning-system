@extends('backend.layouts.app')
@section('title', __('Dzongkhag'))
@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Dzongkhag')
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.dzongkhag.create')"
                :text="__('Create Dzongkhag')"
            />
        </x-slot>
        <x-slot name="body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{$row['name']}}</td>
                            <td>
                            <a class="btn btn-success" href="{{route('admin.dzongkhag.edit',$row->id)}}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
