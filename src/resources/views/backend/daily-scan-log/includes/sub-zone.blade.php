@if($dailyscan->householdDetail)
    @if($dailyscan->householdDetail->building)
        {{$dailyscan->householdDetail->building->subZone->name}}
    @endif
@else

@endif