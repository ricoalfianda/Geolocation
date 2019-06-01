<html>
<head>
    <title>SIGAS</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	  <script type="text/javascript" src="assets/bootstrap/js/jquery.js"></script>
	  <script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"></script>

    <!--<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
</head>

<body>
<center>
<p id="tampilkan"></p>
<p><button class="btn btn-danger btn-md" onclick="getLocation()">Posisi Anda</button>

<div id="mapcanvas"></div>
</center>

<script src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA-AB-9XZd-iQby-bNLYPFyb0pR2Qw3orw&callback=initMap"></script>




<script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
    }
}

function showPosition(position) {
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    latlon = new google.maps.LatLng(lat, lon)
    mapcanvas = document.getElementById('mapcanvas')
    mapcanvas.style.height = '720px';
    mapcanvas.style.width = '1290x';

    var myOptions = {
    center:latlon,
    zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);
    var marker = new google.maps.Marker({
        position:latlon,
        map:map,
        title:"Kamu Disini"
    });
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            view.innerHTML = "Permission dennied"
            break;
        case error.POSITION_UNAVAILABLE:
            view.innerHTML = "Your location is not found"
            break;
        case error.TIMEOUT:
            view.innerHTML = "Request timeout"
            break;
        case error.UNKNOWN_ERROR:
            view.innerHTML = "An unknown error occurred."
            break;
    }
 }
</script>

</body>
</html>
