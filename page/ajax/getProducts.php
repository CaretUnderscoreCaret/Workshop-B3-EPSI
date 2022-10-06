<?php
include '../../includes/include_top.php';

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
				<img src="'.URL.'images/products/'.$product['product_id'].'.jpg" width="50" height="50" style="margin: 3px;border: #57854f solid 2px;cursor: pointer;" onClick="showProduct('.$product['product_id'].');"></img>
				<div>
					'.$product['product_name'].' : 
					'.$product['prix_U'].'€ <br>
					'.$product['description'].'
					
				</div>
			</div>
			<span class="ProductPhoto" style="display: none;" id="Photo_'.$product['product_id'].'">
				<img src="'.URL.'images/products/'.$product['product_id'].'.jpg" width="400" height="400" style="margin: 3px;border: #57854f solid 2px;"></img>
				<p style="position: absolute;top: 1%;left: 93%;cursor: pointer;" onClick="showProduct('.$product['product_id'].')">&#10060;</p>
			</span>
		';
	}
}


echo json_encode($html);