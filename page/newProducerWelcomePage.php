<?php
$pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
$query = DB::query("
	INSERT INTO producer (name, longitude, latitude, description, horraire_lundi, horraire_mardi, horraire_mercredi, horraire_jeudi, horraire_vendredi, score, email, adresse, ville, cp, telephone, mdp)
	VALUES 	('".$_POST['name']."',"
	.$_POST['longitude'].","
	.$_POST['latitude'].","
	.'"'.$_POST['description'].'"'.','
	.'"'.$_POST['horairelun'].'"'.","
	.'"'.$_POST['horairemar'].'"'.","
	.'"'.$_POST['horairemer'].'"'.","
	.'"'.$_POST['horairejeu'].'"'.","
	.'"'.$_POST['horaireven'].'"'
	.",0".","
	.'"'.$_POST["mail"].'"'.","
	.'"'.$_POST["adresse"].'"'.","
	.'"'.$_POST["ville"].'"'.","
	.'"'.$_POST["cp"].'"'.","
	.'"'.$_POST["telephone"].'"'.","
	.'"'.$pwd.'"'.")
");