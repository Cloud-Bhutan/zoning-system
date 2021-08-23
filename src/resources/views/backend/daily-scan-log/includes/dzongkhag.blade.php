@if($dailyscan->householdDetail)
    @if($dailyscan->householdDetail->building)
        {{$dailyscan->householdDetail->building->subZone->zone->dzongkhag->name}}
    @endif
@else

@endif