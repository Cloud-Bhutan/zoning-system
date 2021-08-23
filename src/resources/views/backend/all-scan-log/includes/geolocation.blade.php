@if($allscan->lat)
(<a href="http://www.google.com/maps/place/{{$allscan->lat}},{{$allscan->lng}}" target="_blank">{{$allscan->lat}}, {{$allscan->lng}}</a>)
@else
Location unavailable
@endif