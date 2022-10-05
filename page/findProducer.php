<?php

echo '
	<div class="content">
		<h1>Nos producteurs près de chez vous</h1>
		
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
		<div class="line_content">
			<div>
				<label>Distance : </label>
				<input id="distance" type="number" onChange="updateProducers(this.value);" value="10" style="width: 50px;"></input>km
			</div>
			<button class="btn" style="min-height: 0px;margin-left:20px;" onClick="localiser();">Localiser moi</button>
		</div>
		<div id="map"></div>
		<script src="'.URL.'/page/js/map.js"> </script>
		<script>
			display_map();
		</script>
	</div>
';