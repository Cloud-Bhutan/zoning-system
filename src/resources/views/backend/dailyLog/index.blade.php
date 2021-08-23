@extends('backend.layouts.app')
@section('title', __('Zone'))
@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Daily Scanned Log')
        </x-slot>
        <x-slot name="body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Shop Name</th>
                        <th>Shop Mobile No.</th>
                        <th>House Hold Owner Name</th>
                        <th>House Hold Phone No.</th>
                        <th>Scanned On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{$row->shop->name}}</td>
                            <td>{{$row->shop->mobile_no}}</td>
                            <td>{{$row->householdDetail->name}}</td>
                            <td>{{$row->householdDetail->mobile_no}}</td>
                            <td>{{$row->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
