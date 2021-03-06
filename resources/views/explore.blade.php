@extends('app')
@section('header')

<title>Explore</title>
<center><h1>Explore All Academies</h1>   
<a class="btn btn-default" href="/academy/create">Create Academy</a>       
</center>
    
@stop

@section('content')
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      #map {
        height: 500px;
      }
    </style>

    <div id="map"></div>

    <script>

    
    	function initMap() {
		  var map = new google.maps.Map(document.getElementById('map'), {
		    center: {lat: 0, lng: 0},
		    zoom: 3,
		    styles: [{
		      featureType: 'poi',
		      stylers: [{ visibility: 'off' }]  // Turn off points of interest.
		    }, {
		      featureType: 'transit.station',
		      stylers: [{ visibility: 'off' }]  // Turn off bus stations, train stations, etc.
		    }],
		    
		    disableDoubleClickZoom: true
		  });

		 

		  @foreach ($academies as $academy) 
			

		  	var marker = new google.maps.Marker({
		      position: new google.maps.LatLng({{ $academy->getLatitude() }}, {{ $academy->getLongitude() }}),
		      map: map,
		      label: "{{ $academy->getName() }}"
		    });

		    marker.addListener('click', function(e) {

		    $.post("/academy/show",
		    {
		      id: {{ $academy->getId() }}
		    });
		    $(document).ajaxSuccess(function(data){
 				 window.location.href = "/academy/showdetails/"+{{ $academy->getId() }}
			});	
		  });

		 @endforeach
		  

		   
		}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpTDVzogcJvuoKZbZJ5MK1slJBwz3QbS4
    &libraries=visualization&callback=initMap">
    </script>

@stop