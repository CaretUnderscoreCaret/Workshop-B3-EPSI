<?php
if(isset($_GET['action']) && $_GET['action'] == 'add_product'){
	if(
		isset($_POST['name']) &&
		isset($_POST['description']) &&
		isset($_POST['type']) &&
		isset($_POST['prix']) &&
		count($_FILES)
	){
		$data = [
			'product_name' => $_POST['name'],
			'type'		   => $_POST['type'],
			'producer_id'  => $_SESSION['id'],
			'description'  => $_POST['description'],
			'prix_U'	   => $_POST['prix']
		];
		$id = DB::insert('products',$data);
		rename($_FILES['photo']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/LocalFood/Workshop-B3-EPSI/images/products/'.$id.'.jpg');
	}else{
		echo 'ERREUR';
		var_dump($_POST);
	}
}
echo '
	<script src="'.URL.'/page/js/products.js"> </script>
	<div class="content">
		<div class="p_list">
					<div class="line_content">
						type : <select id="types" onChange="getProducts('.$_SESSION['id'].');">
							<option value=0>Tous</option>
';
$type_query = DB::query("
	SELECT type_id,name
	FROM types
");
while($type = DB::fetch($type_query)){
	echo '<option value="'.$type['type_id'].'">'.$type['name'].'</option>';
}
echo '
				</select>
			</div>
			<div class="product_list" id="product_list"></div>
		</div>
		<script>
			getProducts('.$_SESSION['id'].');
		</script>
		<button class="btn" style="margin-bottom:20px;">Nouveau Produit</button>

		<div class="create_product">
				<form action ="index.php?page=mesProduits&action=add_product" method="post" enctype=\'multipart/form-data\'>
				<p>
					<label>Nom</label>
					<input name="name" id="nom" type="text" required></input><br>
				</p>
				<p>
					<label>Description</label>
					<textarea id="desc" name="description" row="10" col="50" maxlength="500" required></textarea>
				</p>
				<p>
					<label>Type</label>
					<select id="type" name="type">
';
	$type_query = DB::query("
		SELECT type_id,name
		FROM types
	");
	while($type = DB::fetch($type_query)){
		echo '<option value="'.$type['type_id'].'">'.$type['name'].'</option>';
	}
echo '
					</select>
				</p>
				<p>
					<label>Prix</label>
					<input id="prix" name="prix" type="number" min="0" required></input><br>
				</p>
				<p>
					<label>Photo</label>
					<input id="photo" name="photo" type="file" accept="image/jpeg" required></input><br>
				</p>
				<p>
					<input class="btn" type="submit" value="Créer"></input>
				</p>
			</form>
		</div>
	</div>
';