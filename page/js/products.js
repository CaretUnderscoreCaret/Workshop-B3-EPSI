function getProducts(producer){
	var e = document.getElementById("types");
	var type = e.value;
	data = {
		'type'  : type,
		'producer' : producer
	};
	$.ajax({
		url : 'page/ajax/getProducts.php',
		contentType: 'application/json',
		type: "GET",
		dataType : 'json',
		data : data,
		done: function(response){
			console.log('done')
		},
		error: function(error){
			console.log('error : '+ JSON.stringify(error))
		},
		fail: function(response){
			console.log('fail')
		},
		success: function(data){
			var e = document.getElementById('product_list');
			e.innerHTML = data;
		}
	});
}