<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Points of interest</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmIBlcceTPcS6MJA6nZur2vzk4qGAvpHU&v=3.11&sensor=false" 
                   type="text/javascript"></script>
                   <script type="text/javascript">
    $(document).ready(function() {
        // execute
        (function() {
            // Points of interest
            var locations = new Array();
            var i = 0;
            locations[i++] = "Rijksmuseum, Museumstraat 1, Amsterdam"
            locations[i++] = "Van Gogh Museum, Paulus Potterstraat 7, Amsterdam";
            locations[i++] = "Kroller-Muller Museum, Houtkampweg 6, Otterlo";
            locations[i++] = "Beeckestijn, Rijksweg 136, Velsen";
            var total_locations = i;
            i = 0;
			console.log('About to look up ' + total_locations + ' locations');
// map options
var options = {
    zoom: 8,
    center: new google.maps.LatLng(52.2313, 4.83565), // Amstelhoek, center of the world
    mapTypeId: google.maps.MapTypeId.TERRAIN,
    mapTypeControl: true
};

// init map
console.log('Initialise map...');
var map = new google.maps.Map(document.getElementById('map_canvas'), options);
var geocoder = new google.maps.Geocoder();
if (geocoder) {
    console.log('Got a new instance of Google Geocoder object');
    // Call function 'createNextMarker' every second
    var myVar = window.setInterval(function(){createNextMarker()}, 1000);
	function createNextMarker() {
    if (i < locations.length) {
        var customer = locations[i];
        var parts = customer.split(",");
        var name = parts.splice(0,1);
        var address = parts.join(",");
        console.log('Looking up ' + name + ' at address ' + address);
        geocoder.geocode({ 'address': address }, makeCallback(name));
        i++;
        updateProgressBar(i / total_locations);
    } else {
        console.log('Ready looking up ' + i + ' addresses');
        window.clearInterval(myVar);
    }
}
function makeCallback(name) {
        var geocodeCallBack = function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var longitude = results[0].geometry.location.lng();
                var latitude = results[0].geometry.location.lat();
                console.log('Received result: lat:' + latitude + ' long:' + longitude);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(latitude, longitude),
                    map: map,
                    title: name + ' : ' + results[0].formatted_address});
            } else {
                console.log('No results found: ' + status);
            }
        }
        return geocodeCallBack;
    }
}

function updateProgressBar(percentage_factor) {
            var map_canvas = document.getElementById('map_canvas');
            var node = document.getElementById('progress_bar');
            var w = map_canvas.style.width.match(/\d+/);
            w = w * percentage_factor;
            node.style.width = parseInt(w) + 'px';
            if (percentage_factor == 1) {
                // jscript style properties are different to the CSS style properties
                node.style.backgroundColor = 'green';
            }
        }
    // Closing bits of jscript...
    })();
});
</script>
</head>
    <body>
    <div style="border: 1px solid black; width:1024px; height:3px;">
        <div id="progress_bar" style="height:3px; width:0px; background-color:red;"/>
    </div>
    <!-- if you change this id, then also update code of progress bar above -->
        <div id="map_canvas" style="width: 1024px; height:600px;"></div>
    </body>
</html>