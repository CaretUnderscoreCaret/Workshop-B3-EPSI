<?php

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
	</div>
	<script>
		getProducts('.$_GET['id'].');
	</script>
';