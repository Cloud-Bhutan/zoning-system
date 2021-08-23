@if($allscan->householdDetail->building)
{{$allscan->householdDetail->building->subZone->zone->dzongkhag->name}}
@else

@endif