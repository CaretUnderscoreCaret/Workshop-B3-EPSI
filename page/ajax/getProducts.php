<?php
include '../../includes/classes/DB.php';
DB::connect();

if(isset($_GET['type'])){
	$products_query = DB::query("
	SELECT product_id, product_name, type, description, prix_U 
	FROM products
	WHERE producer_id = ".$_GET['producer']."
		".($_GET['type']?'AND type ='.$_GET['type']:'')."
	");
	$html = '';
	while($product = DB::fetch($products_query)){
		$html.= '
			<div class="product">
				'.$product['product_name'].' : 
				'.$product['description'].' : 
				'.$product['prix_U'].'€
			</div>
		';
	}
}


echo json_encode($html);