<?php

echo '
	<div class="content">
		<h1>Nos producteurs près de chez vous</h1>
		
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
		<div id="map" style="height: 500px; width: 500px;"></div>
		<script src="'.URL.'/page/js/map.js"> </script>
		<script>
			display_map();
		</script>
	</div>
';
echo '
<script>
function success(pos) {
	var crd = pos.coords;
  
	console.log(\'Votre position actuelle est :\');
	console.log(`Latitude : ${crd.latitude}`);
	console.log(`Longitude : ${crd.longitude}`);
	console.log(`La précision est de ${crd.accuracy} mètres.`);
  }
	console.log(navigator.geolocation.getCurrentPosition(success));
</script>
';