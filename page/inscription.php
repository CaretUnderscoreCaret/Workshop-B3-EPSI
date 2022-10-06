<?php
if(isset($_GET['action']) && $_GET['action'] == 'create_producer'){
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
	$query = DB::query("
		SELECT id
		FROM producer
		WHERE mdp = '".$pwd."'
	");
	if($query != null && $producer = DB::fetch($query)){
		$_SESSION['id']= $producer['id'];
		header('Location: '.URL.'index.php?page=findProducer');
	}else{
		echo '
			<div class="content">
				Erreur lors de la connexion.
			</div>
		';
	}
}else{
	echo '
	<script src="'.URL.'/page/js/producer.js"> </script>
	<div class="content">
		<h1>Inscription</h1>
	
		<form method="POST" action="index.php?page=newProducer&action=create_producer">
			<label for="name">Nom:</label>
		<br>
			<input type="text" id="name" name="name" style="background-color: white" required maxlength="50" size="50">
		<br>
			<label for="pwd">Mot de passe:</label>
		<br>
			<input type="password" id="pwd" name="pwd" style="background-color: white" required maxlength="50" size="50">
		<br>
			<label for="adresse">Adresse:</label>
		<br>
			<input type="text" id="adresse" name="adresse" style="background-color: white" required maxlength="100" size="50">
		<br>
			<label for="cp">Code postal:</label>
		<br>
			<input type="number" id="cp" name="cp" style="background-color: white" required>
		<br>
			<label for="ville">Ville:</label>
		<br>
			<input type="text" id="ville" name="ville" style="background-color: white" required maxlength="100" size="50">
		<br>
			<label for="telephone">Téléphone:</label>
		<br>
			<input type="tel" id="telephone" name="telephone" style="background-color: white" placeholder="0675757575" pattern="0[0-9]{9}">
		<br>
			<label for="mail">Email:</label>
		<br>
			<input id="mail" name="mail" style="background-color: white" placeholder="loc@localfood.fr" pattern="[a-zA-Z0-9.]{1,}[@][a-zA-Z0-9]{1,}[.][a-zA-Z0-9]{1,}">
		<br>
			<label for="des">Descritption:</label>
		<br>
			<textarea id="description" name="description" row="10" col="50" maxlength="500"></textarea>
		<br>
		
	
		<input style="margin:5px;" class="btn" type="button" id="test" name="test" value="Auto-complétion d\'adresse" onclick="getAdress();">
		<input style="margin:5px;" class="btn" type="submit" value="Inscription">
		<input type="number" id="latitude" name="latitude" step="0.00000000001" hidden>
		<input type="number" id="longitude" name="longitude" step="0.00000000001" hidden>
		</form>
	</div>
	';
}


