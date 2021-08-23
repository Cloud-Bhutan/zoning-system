@if($date->updated_at)
{{ $date->updated_at->format('Y-m-d h:i A') }}
@else
{{ $date->updated_at}}
@endif