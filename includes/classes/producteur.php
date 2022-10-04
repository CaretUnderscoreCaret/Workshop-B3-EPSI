<?php
class Producteur{
	
	public static function getProdFromDB() {
		return DB::query("SELECT * FROM prod");
	}

	public static function displayMapProd() {
		$res = Producteur::getProdFromDB();
		while($prod = DB::fetch($res)){
			echo("var marker = L.marker([". $prod["Lat"] . "," . $prod["Longitude"] . "]).addTo(map);");
	   }
	}
}
?>