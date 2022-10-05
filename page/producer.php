<?php
echo '
	<a class="btn" style="margin:10px;text-decoration: none;padding-top: 5px;" href="'.URL.'index.php?page=findProducer">< Retour</a>
';
if(isset($_GET['id'])){
	$producer_query = DB::query("
		SELECT 
			id,	name, longitude, latitude, description, score,
			horraire_lundi, horraire_mardi, horraire_mercredi, horraire_jeudi, horraire_vendredi
		FROM producer
		WHERE id = ".$_GET['id']."
	
	");
	$producer = DB::fetch($producer_query);
	echo '<div class="content">';
	if($producer == null){
		echo 'Aucun producteur trouvé !';
	}else{
		echo'<h2>'.$producer['name'].'</h2><p>'.$producer['score'].' ';
		
		for($i = 1; $i <=5; $i++){
			echo ($producer['score']>$i?'&#9733;':'&#9734;');
		}
		echo '
			</p>
			<p style="margin:30px;">'.$producer['description'].'</p>
			<div class="content">
				Lundi    : '.$producer['horraire_lundi'].'<br>
				Mardi    : '.$producer['horraire_mardi'].'<br>
				Mercredi : '.$producer['horraire_mercredi'].'<br>
				Jeudi    : '.$producer['horraire_jeudi'].'<br>
				Vendredi : '.$producer['horraire_vendredi'].'<br>
			</div>
		';
	}
	echo '</div>';
}
