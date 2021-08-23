<table class="table table-bordered">
    <thead>
    @if ($reportType=='DETAIL_REPORT')
        <tr>
            <th>House QR Id</th>
            <th>Dzongkhag</th>
            <th>Zone</th>
            <th>Sub Zone</th>
            <th>Building No.</th>
            <th>House Owner</th>
            <th>Mobile No.</th>
            <th>Total Female Member</th>
            <th>Total Male Member</th>
            <th>Total Member Below Age 10</th>
            <th>Total Member Above Age 60</th>
            <th>Emergency No.</th>
        </tr>
    @else
        <tr>
            <th>Dzongkhag</th>
            <th>Zone</th>
            <th>Sub Zone</th>
            <th>Total Female Member</th>
            <th>Total Male Member</th>
            <th>Total Member Below Age 10</th>
            <th>Total Member Above Age 60</th>
        </tr>
    @endif
    </thead>
    <tbody>
        @foreach ($allvisitLog as $row)
            @if ($reportType=='DETAIL_REPORT')
                <tr>
                    <td>{{$row->qr_code_id}}</td>
                    <td>{{$row->dzongkhag}}</td>
                    <td>{{$row->zone}}</td>
                    <td>{{$row->subZone}}</td>
                    <td>{{$row->building_number}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->mobile_no}}</td>
                    <td>{{$row->total_female}}</td>
                    <td>{{$row->total_male}}</td>
                    <td>{{$row->total_below_10}}</td>
                    <td>{{$row->total_above_60}}</td>
                    <td>{{$row->emergency_contact_no}}</td>
                </tr>
            @else
                <tr>
                    <td>{{$row->dzongkhag}}</td>
                    <td>{{$row->zone}}</td>
                    <td>{{$row->subZone}}</td>
                    <td>{{$row->totalFemale}}</td>
                    <td>{{$row->totalMale}}</td>
                    <td>{{$row->totalBelow}}</td>
                    <td>{{$row->totalAbove}}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>