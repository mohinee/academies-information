@extends('app')
@section('header')

<title>Explore</title>
<h1>Explore All Academies</h1>   
<a href="/academy/create">Create Academy</a>       

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 500px;
      }
    </style>

@stop

@section('content')

    <div id="map"></div>

    <script>

    var academies = <?php echo $academies; ?>;
    
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

		 

		  <?php foreach ($academies as $academy) { ?>

		  	var marker = new google.maps.Marker({
		      position: new google.maps.LatLng(<?php echo $academy->getLatitude(); ?>, <?php echo $academy->getLongitude(); ?>),
		      map: map,
		      label: "<?php echo $academy->getName(); ?>"
		    });

		    marker.addListener('click', function(e) {

		    $.post("/academy/show",
		    {
		      id: <?php echo $academy->getId(); ?>
		    });
		    $(document).ajaxSuccess(function(data){
 				 window.location.href = "/academy/showdetails/"+<?php echo $academy->getId(); ?>
			});	
		  });

		  <?php } ?>
		  

		   
		}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpTDVzogcJvuoKZbZJ5MK1slJBwz3QbS4
    &libraries=visualization&callback=initMap">
    </script>

@stop