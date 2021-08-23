@if($householdDetail->building)
{{ $householdDetail->building->subZone->name}}
@else
No Zone Mapped
@endif