
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key="></script>
<?php
$rahasia = "AIzaSyDcNfPU5Xhy2zxtoZKfkLUnpJvtWLLozbY";#Rahasia
//-6.913633, 107.643040
?>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
  document.getElementById('longitude').innerHTML = "Longitude  :"+[latLng.lng()];
  document.getElementById('latitude').innerHTML = "Latitude  :"+[latLng.lat()];
  document.getElementById('longitudeform').value = [latLng.lng()];
  document.getElementById('latitudeform').value = [latLng.lat()];
}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
  document.getElementById('adres').value = str;
}
//-7.566667,110.816667
function initialize() {
  var latLng = new google.maps.LatLng(<?=$longitude?>,<?=$latitude?>);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 15,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });
  
  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);
  
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });
  
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>
  <style>
  #mapCanvas {
    min-width: 400px;
    height: 400px;
    float: left;
  }
  #infoPanel {
    float: left;
    margin-left: 10px;
  }
  #infoPanel div {
    margin-bottom: 5px;
  }
  </style>
  
  <div id="mapCanvas" class="col-md-12"></div>
  <div id="infoPanel">
    <b>Marker status:</b><br>
    <div id="markerStatus"><i>Click and drag the marker.</i></div>
    <b>Current position:</b>
    <div id="longitude"></div>
    <div id="latitude"></div>
    <b>Closest matching address:</b>
    <div id="address"></div>
  </div>
</body>
</html>
