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
                        <th>Zone</th>
                        <th>Sub Zone</th>
                        <th>Building No.</th>
                        <th>Name of Head of House</th>
                        <th>Mobile No</th>
                        <th>No of Heads</th>
                        <th>Total Female Member</th>
                        <th>Total Male Member</th>
                        <th>Total Member Above Age 60</th>
                        <th>Total Member Below Age 10</th>
                        <th>Emergency Contact No</th>
                        <th>Nationality</th>
                        <th>Registered on</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td>
                                @if ($row->building)
                                    {{$row->building->subzone->zone->name}}    
                                @endif
                            </td>
                            <td>
                                @if ($row->building)
                                    {{$row->building->subzone->name}}    
                                @endif
                            </td>
                            <td>
                                @if ($row->building)
                                    {{$row->building->building_number}}    
                                @endif
                            </td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->mobile_no}}</td>
                            <td>{{$row->no_of_heads}}</td>
                            <td>{{$row->total_female}}</td>
                            <td>{{$row->total_male}}</td>
                            <td>{{$row->total_above_60}}</td>
                            <td>{{$row->total_below_10}}</td>
                            <td>{{$row->emergency_contact_no}}</td>
                            <td>{{$row->nationality}}</td>
                            <td>{{date('d-m-Y h:i:s A', strtotime($row->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </x-slot>
    </x-backend.card>
@endsection
