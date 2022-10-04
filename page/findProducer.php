<?php

echo '
	<div class="content">
		<h1>Nos producteurs près de chez vous</h1>
		
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
		<div>
			<label>Distance : </label>
			<input type="number" onChange="updateProducers(this.value);" value="10"></input>
		</div>
		<div id="map"></div>
		<script src="'.URL.'/page/js/map.js"> </script>
		<script>
			display_map();
		</script>
	</div>
';