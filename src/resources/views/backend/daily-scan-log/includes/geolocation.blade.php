@if($dailyscan->lat)
(<a href="http://www.google.com/maps/place/{{$dailyscan->lat}},{{$dailyscan->lng}}" target="_blank">{{$dailyscan->lat}}, {{$dailyscan->lng}}</a>)
@else
Location unavailable
@endif