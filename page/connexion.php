<?php
echo '<div class="content" style="min-height: 420px;">';
$erreur = '';
if(isset($_POST['mdp']) && isset($_POST['email'])){
	$query = DB::query("
		SELECT id, mdp
		FROM producer
		WHERE email = '".$_POST['email']."'
	");
	if($query == null){
		$erreur = 'Email inconnue';
	}else{
		$producer = DB::fetch($query);
		if(password_verify($_POST["mdp"],$producer['mdp'])){
			$_SESSION['id']=$producer['id'];
			header('Location: '.URL.'index.php?page=findProducer');
		}else{
			$erreur = 'Mot de passe incorect.';
		}
	}
}
echo '
		<h1>Connexion</h1>
		<form id="conn" action="" method="post">
			<label>Email : </label><input type="text" name="email"></input>
			<label>Mot de passe : </label><input type="password" name="mdp"></input>
			<button class="btn" onClick="document.forms["conn"].submit();" style="margin-top:5px;">Connexion</button>
		</form>
		'.$erreur.'
	</div>
';