<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
    jQuery(function($) {
        google.load("maps", "3.x", {other_params: "sensor=false&key=AIzaSyCmP5cNE0wSlbqAQ1M8M8SU5ijbkSPKOq8", callback:initialize});
    });

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var selectedMode = $('#mode').val();//document.getElementById('mode').value;
        directionsService.route({
            origin: $('#start').val(),//document.getElementById('start').value,
            destination: $('#end').val(),//document.getElementById('end').value,
            travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    function initialize() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});

        var map;
        var bounds = new google.maps.LatLngBounds();
        var mapOptions = {
            mapTypeId: 'roadmap'
        };

        // Display a map on the page
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        map.setTilt(45);

        // Multiple Markers
        var markers = globale['markers'];

        // Info Window Content
        var infoWindowContent = globale['infoWindowContent'];

        // Display multiple markers on a map
        var infoWindow = new google.maps.InfoWindow(), marker, i;

        // Loop through our array of markers & place each one on the map
        for( i = 0; i < markers.length; i++ ) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });

            // Allow each marker to have an info window
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));

            // Automatically center the map fitting all markers on the screen
            map.fitBounds(bounds);
        }

        // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            this.setZoom(15);
            google.maps.event.removeListener(boundsListener);
        });

        var onChangeHandler = function() {
            directionsDisplay.setMap(map);
            calculateAndDisplayRoute(directionsService, directionsDisplay);
        };

        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);
        document.getElementById('mode').addEventListener('change', onChangeHandler);
    }
</script>

<h1>Find your local dentist</h1>

<form action="{{ URL::to($url) }}" method="POST">
    {{ csrf_field() }}
    <input type="text" placeholder="Refine search suburb or postcode">
    <input type="checkbox">wheel chair
    <input type="checkbox">sat
    <input type="checkbox">0
    <select name="service">
        <option>Service</option>
    </select>
    <select name="health-fund">
        <option>Health Fund</option>
    </select>
    <select name="service-hours">
        <option>24hr Emergency care</option>
        <option>Early mornings</option>
        <option>Evenings</option>
        <option>Saturdays</option>
    </select>
    <button>SEARCH</button>
</form>

<div class="suggested_results">
    <?php foreach($site as $val): ?>
        <p class="suggested_item" data-suburb="<?php echo $val->Suburb; ?>" data-postcode="<?php echo $val->PostCode; ?>" data-state="<?php echo $val->State; ?>"><?php echo $val->Suburb . ',' . $val->PostCode; ?></p>

    <?php endforeach; ?>
</div>

<div id="floating-panel">
    <b>Mode of Travel: </b>
    <select id="mode">
        <option value="DRIVING">Driving</option>
        <option value="WALKING">Walking</option>
        <option value="BICYCLING">Bicycling</option>
        <option value="TRANSIT">Transit</option>
    </select>
</div>
<div id="floating-panel">
    <b>Start: </b>
    <select id="start">
        <?php foreach($site as $val): ?>
            <option value="<?php echo $val->Latitude . ', ' . $val->Longitude; ?>"><?php echo $val->PracticeName . ', ' . $val->Suburb; ?></option>
        <?php endforeach; ?>
    </select>
    <b>End: </b>

    <?php $results=array(); $results_html=array();?>
    <select id="end">
        <?php foreach($site as $val): ?>
            <option value="<?php echo $val->Latitude . ', ' . $val->Longitude; ?>"><?php echo $val->PracticeName . ', ' . $val->Suburb; ?></option>
            <?php
            array_push($results,array(
                $val->PracticeName,
                $val->Latitude,
                $val->Longitude
            ));

            array_push($results_html,array(
                '<div class="info_content"><h3>'.$val->PracticeName.'</h3></div>',
            ))
            ?>
        <?php endforeach; ?>
    </select>
</div>


<div id="map_wrapper">
    <div id="map_canvas" class="mapping"></div>
</div>

<script>
    globale={};
    globale['markers']=<?php echo json_encode($results); ?>;
    globale['infoWindowContent']=<?php echo json_encode($results_html); ?>;
</script>
