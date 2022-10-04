var map = L.map('map').setView([47.13417, 2.592773], 6);
var producteurs = L.layerGroup();
var longitude;
var latitude;

function getLocalisationSuccess(pos){
	var crd = pos.coords;
	map.setView([crd.latitude, crd.longitude], 12);
	L.marker([crd.latitude, crd.longitude]).addTo(map);
	longitude = crd.longitude;
	latitude = crd.latitude;
}

function error(err) {
	console.warn(`ERREUR (${err.code}): ${err.message}`);
  }

function display_map(){
	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);
	var marker = L.marker([51.5, -0.09]).addTo(map);
	var circle = L.circle([51.508, -0.11], {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5,
		radius: 500
	}).addTo(map);

	var options = {
		enableHighAccuracy: true,
		timeout: 5000,
		maximumAge: 0
	};
	navigator.geolocation.getCurrentPosition(getLocalisationSuccess,error,options);
}

function updateProducers(distance){
	if(map.hasLayer(producteurs)){
		producteurs.clearLayers();
	}
	data = {
		'longitude'  : longitude,
		'latitude': latitude,
		'distance'	: distance.value
	};
	$.ajax({
		url : 'page/ajax/getProducers.php',
		contentType: 'application/json',
		type: "GET",
		dataType : 'json',
		data : data,
		done: function(response){
			console.log('done')
		},
		error: function(error){
			console.log('error : '+ JSON.stringify(error))
		},
		fail: function(response){
			console.log('fail')
		},
		success: function(data){
			for (const [key, value] of Object.entries(data)) {
				var greenIcon = new L.Icon({
					iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
					shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
					iconSize: [25, 41],
					iconAnchor: [12, 41],
					popupAnchor: [1, -34],
					shadowSize: [41, 41]
				});
				var marker = L.marker([value.latitude, value.longitude], {icon: greenIcon});
				marker.bindPopup(value.name);
				marker.addTo(producteurs);
			}
			map.addLayer(producteurs);
		}
	});
}