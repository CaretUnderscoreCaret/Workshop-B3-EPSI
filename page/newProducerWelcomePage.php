<?php
echo($_POST["name"]);
echo($_POST["adresse"]);
echo($_POST["cp"]);
echo($_POST["ville"]);
echo($_POST["telephone"]);
echo($_POST["mail"]);
echo($_POST["latitude"]);
echo($_POST["longitude"]);
echo($_POST["description"]);


$query = DB::query("
	INSERT INTO producer (name, longitude, latitude, description, horraire_lundi, horraire_mardi, horraire_mercredi, horraire_jeudi, horraire_vendredi, score)
	VALUES 	('".$_POST['name']."',".$_POST['longitude'].",".$_POST['latitude'].",".'"'.$_POST['description'].'"'.','.'"'.$_POST['horairelun'].'"'.",".'"'.$_POST['horairemar'].'"'.",".'"'.$_POST['horairemer'].'"'.",".'"'.$_POST['horairejeu'].'"'.",".'"'.$_POST['horaireven'].'"'.",0".")
");