<?php
echo '
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<style>#map { height: 500px; width: 500px; }</style>
	</head>
	<body>
		
	</body>
	</html>
';
echo '
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css"
integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
crossorigin=""/>
';

echo '
<script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js"
	 integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s="
	 crossorigin=""></script>



	<div id="map"></div>

	<script>var map = L.map(\'map\').setView([47.13417, 2.592773], 6);
		L.tileLayer(\'https://tile.openstreetmap.org/{z}/{x}/{y}.png\', {
		maxZoom: 19,
		attribution: \'&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>\'
	}).addTo(map);
	var marker = L.marker([51.5, -0.09]).addTo(map);
	var circle = L.circle([51.508, -0.11], {
		color: \'red\',
		fillColor: \'#f03\',
		fillOpacity: 0.5,
		radius: 500
	}).addTo(map);
	</script>
';

echo '
<script>
	console.log(navigator.geolocation.getCurrentPosition());
</script>
';