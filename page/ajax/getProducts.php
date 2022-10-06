<?php
include '../../includes/include_top.php';
if(isset($_GET['action']) && $_GET['action'] == 'getProducts'){
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
					<div style="width: 100%;">
						'.$product['product_name'].' : 
						'.$product['prix_U'].'€ <br>
						'.$product['description'].'
					</div>
			';
			if(isset($_GET['edit']) && $_GET['edit']){
				$html .= '
					<div>
						<p style="cursor: pointer;" onClick="deleteProduct('.$product['product_id'].','.$_GET['producer'].');">&#10060;</p>
					</div>
				';
			}
			$html .= '
				</div>
				<span class="ProductPhoto" style="display: none;" id="Photo_'.$product['product_id'].'">
					<img src="'.URL.'images/products/'.$product['product_id'].'.jpg" width="400" height="400" style="margin: 3px;border: #57854f solid 2px;"></img>
					<p style="position: absolute;top: 1%;left: 93%;cursor: pointer;" onClick="showProduct('.$product['product_id'].')">&#10060;</p>
				</span>
			';
		}
	}
	echo json_encode($html);
}elseif(isset($_GET['action']) && $_GET['action'] == 'deleteProduct'){
	if(isset($_GET['pid'])){
		$query = DB::query("
			DELETE FROM products
			WHERE product_id = ".$_GET['pid']."
		");
		unlink($_SERVER['DOCUMENT_ROOT'].'/LocalFood/Workshop-B3-EPSI/images/products/'.$_GET['pid'].'.jpg');
		echo json_encode('deleted');
	}else{
		echo json_encode('error');
	}
}else{
	echo json_encode('erreur action inconnue');
}



