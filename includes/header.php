<?php
include 'classes/DB.php';
session_start();
DB::connect();
define('URL','https://'.$_SERVER['HTTP_HOST'].'/LocalFood/Workshop-B3-EPSI/');
echo '
<!DOCTYPE html> 
<html lang="fr">
<script src="'.URL.'/includes/js/header.js"> </script>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Exemple d\'un menu responsive</title>  
		<link rel="stylesheet" href="'.URL.'/css/header.css">  
	</head> 
	<body>   
		<div class="topnav" id="myTopnav">
			<a href="?page=home" class="active">Acceuil</a>
			<a href="?page=findProducer">Trouver des producteurs</a>
			<a href="?page=contact">Contact</a>
			<a href="?page=about">About</a>
			<a href="javascript:void(0);" class="icon" onclick="openMenu()">
				<i class="fa fa-bars"><label>☰</label></i>
			</a>
		</div>
	</body>  
</html>  
';