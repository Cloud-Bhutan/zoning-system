<table class="table table-bordered">
    <thead>
        @if ($reportType=='DETAIL_REPORT')
        <tr>
            <th>Shop Name</th>
            <th>House QR Id</th>
            <th>Dzongkhag</th>
            <th>Zone</th>
            <th>Sub Zone</th>
            <th>Building No.</th>
            <th>Scanned On</th>
        </tr>
        @else
        <tr>
            <th>Dzongkhag</th>
            <th>Zone</th>
            <th>Sub Zone</th>
            <th>Total Scanned</th>
        </tr>
        @endif
    </thead>
    <tbody>
        @foreach ($allvisitLog as $row)
            @if ($reportType=='DETAIL_REPORT')
                <tr>
                    <td>{{$row->shopName}}</td>
                    <td>{{$row->qr_code_id}}</td>
                    <td>{{$row->dzongkhag}}</td>
                    <td>{{$row->zone}}</td>
                    <td>{{$row->subZone}}</td>
                    <td>{{$row->building_number}}</td>
                    <td>{{$row->created_at}}</td>
                </tr>
            @else
                <tr>
                    <td>{{$row->dzongkhag}}</td>
                    <td>{{$row->zone}}</td>
                    <td>{{$row->subZone}}</td>
                    <td>{{$row->totalVisit}}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>