<?php
echo($_POST["name"]);
echo($_POST["adresse"]);
echo($_POST["cp"]);
echo($_POST["ville"]);
echo($_POST["latitude"]);
echo($_POST["longitude"]);
echo($_POST["description"]);
echo($_POST["horaire"]);


$query = DB::query("
	INSERT INTO producer (name, longitude, latitude)
	VALUES 	('".$_POST['name']."',".$_POST['longitude'].",".$_POST['latitude'].")
");