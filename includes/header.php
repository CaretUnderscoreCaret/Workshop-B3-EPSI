<?php
include 'include_top.php';

if(isset($_GET['deconnexion'])){
	session_destroy();
	header('Location: '.URL.'index.php?page=findProducer');
}

echo '
<!DOCTYPE html> 
<html lang="fr">
<script src="'.URL.'/includes/js/header.js"> </script>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Exemple d\'un menu responsive</title>  
		<link rel="stylesheet" href="'.URL.'/css/header.css">  
		<script src="https://code.jquery.com/jquery-3.6.0.js" type="text/javascript"></script>
	</head> 
	<body>   
		<div class="topnav" id="myTopnav">
			<a href="?page=findProducer" class="active">Trouver des producteurs</a>
';
if(isset($_SESSION['id'])){
	echo '
		<a href="?page=mesProduits">Mes Produits</a>	
		<a href="?page=profil">Profil</a>
		<a href="?page=findProducer&deconnexion=1">Deconnexion</a>
	';
}else{
	echo '
		<a href="?page=inscription">Inscription</a>	
		<a href="?page=Connexion">Connexion</a>
	';
}

echo '
			<a href="javascript:void(0);" class="icon" onclick="openMenu()">
				<i class="fa fa-bars"><label>☰</label></i>
			</a>
		</div>
';