function getProducts(producer,edit){
	var e = document.getElementById("types");
	var type = e.value;
	data = {
		'action'	: 'getProducts',
		'type'  	: type,
		'producer'  : producer,
		'edit'		: edit
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

function showProduct(pid){
	var a = document.getElementsByClassName("ProductPhoto");
	for (let i = 0; i < a.length; i++) {
		if(a.item(i).id != 'Photo_'+pid){
			a.item(i).style.display = "none";
		}
	  }
	var e = document.getElementById('Photo_'+pid);
	if(e.style.display == "block"){
		e.style.display = "none";
	}else{
		e.style.display = "block";
	}
}

function showCreateProduct(){
	var e = document.getElementById('create_product');
	var btn = document.getElementById('btn_create_product');
	if(e.style.display == "block"){
		e.style.display = "none";
		btn.style.display = "block";
	}else{
		e.style.display = "block";
		btn.style.display = "none";
	}
}

function deleteProduct(id,producer){
	data = {
		'action'	: 'deleteProduct',
		'pid'		: id
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
			getProducts(producer,1);
		}
	});
}