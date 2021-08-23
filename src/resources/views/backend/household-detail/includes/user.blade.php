@if($householdDetail->user)
{{ $householdDetail->user->name}}
@else
No user
@endif