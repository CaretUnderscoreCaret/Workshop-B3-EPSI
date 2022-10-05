<?php
include '../../includes/classes/DB.php';
DB::connect();
if(isset($_GET['longitude']) && isset($_GET['latitude'])){
	$longitude = $_GET['longitude'];
	$latitude = $_GET['latitude'];
	$distance  = $_GET['distance'];
}else{
	echo json_encode('[ERROR] : ajax get');
}
$sql = "
	SELECT 
		id,	name, longitude, latitude, description, score,
		horraire_lundi, horraire_mardi, horraire_mercredi, horraire_jeudi, horraire_vendredi,
		ACOS(SIN(RADIANS(".$longitude."))*SIN(RADIANS(longitude))+COS(RADIANS(".$longitude."))*COS(RADIANS(longitude))*COS(RADIANS(".$latitude."-latitude)))*6371 as val
	FROM producer 
	WHERE ACOS(SIN(RADIANS(".$longitude."))*SIN(RADIANS(longitude))+COS(RADIANS(".$longitude."))*COS(RADIANS(longitude))*COS(RADIANS(".$latitude."-latitude)))*6371 <= ".$distance.";
";
$producer_query = DB::query($sql);
while($producer = DB::fetch($producer_query)){
	$producers[$producer['id']] = $producer;
}
echo json_encode($producers);