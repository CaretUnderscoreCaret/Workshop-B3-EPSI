<?php
if(isset($_GET['action']) && $_GET['action'] == 'modify'){
	DB::query('
		update producer 
		set description = "'.$_POST['description'].'" '.'
		where id = '.$_SESSION["id"]
	);
	DB::query('
		update producer 
		set horraire_lundi="'.$_POST['horairelun'].'"'.'
		where id='.$_SESSION["id"]
	);
	DB::query('
		update producer set horraire_mardi="'.$_POST['horairemar'].'"'.'
		where id='.$_SESSION["id"]
	);
	DB::query('
		update producer set horraire_mercredi="'.$_POST['horairemer'].'"'.'
		where id='.$_SESSION["id"]
	);
	DB::query('
		update producer 
		set horraire_jeudi="'.$_POST['horairejeu'].'"'.'
		where id='.$_SESSION["id"]
	);
	DB::query('
		update producer 
		set horraire_vendredi="'.$_POST['horaireven'].'"'.'
		where id='.$_SESSION["id"]
	);
}
$query=DB::query("
	Select 
		description, horraire_lundi, horraire_mardi,
		horraire_mercredi, horraire_jeudi,horraire_vendredi 
	from producer 
	where id =".$_SESSION["id"]."
");
$tab=DB::fetch($query);
echo '
	<div class="content">
		<h1>Profil</h1>
		<form method="POST" action="index.php?page=profil&action=modify">

			<label for="des">Description:</label><br>
			<textarea id="description" name="description" row="10" col="50" maxlength="500">'.$tab["description"].'</textarea>

			<label for="horairelun">Horaires lundi:</label><br>
			<textarea id="horairelun" name="horairelun" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none">'.$tab["horraire_lundi"].'</textarea>
			
			<label for="horairemar">Horaires mardi:</label><br>
			<textarea id="horairemar" name="horairemar" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none">'.$tab["horraire_mardi"].'</textarea>
			
			<label for="horairemer">Horaires mercredi:</label><br>
			<textarea id="horairemer" name="horairemer" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none">'.$tab["horraire_mercredi"].'</textarea>
			
			<label for="horairejeu">Horaires jeudi:</label><br>
			<textarea id="horairejeu" name="horairejeu" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none">'.$tab["horraire_jeudi"].'</textarea>
			
			<label for="horaireven">Horaires vendredi:</label><br>
			<textarea id="horaireven" name="horaireven" row="1" col="50" maxlength="50" placeholder="8h-17h ou fermé" style="resize:none">'.$tab["horraire_vendredi"].'</textarea>

			<input style="margin:5px;" class="btn" type="submit" value="Enregistrer">
		</form>
	</div>
';