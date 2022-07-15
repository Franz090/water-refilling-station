$(function(){
	Products.index();
    Products.fetch();
});

let Products = {
	index: () => {
		$('#add-product-form').submit(function(e){
			e.preventDefault();
			Products.addNewProduct(this);
		});

		$(document).on('click', '.remove-product', function(e){
			e.preventDefault();
			Products.removeProduct($(this));
		})
	},
	removeProduct: (btn) => {
		let productID = {productID: btn.val()};

		$.when(Request.ajax('products/remove', '',productID)).done(function(data){
			console.log(data)
			Products.fetch();
		});
	},
	addNewProduct: (val) => {
		let form = '#add-product-form';
		let params = Serialize.form(form);
		Validate.fields(form);

		let errLenght = $(`${form} .empty-fields`).length;

      	if(errLenght == 0)
      	{
      		var formData = new FormData(val);

			$.ajax({
				url: server + 'products/add-new-product', 
				type: 'POST',
				contentType: false,
				data: formData,
				processData: false,
				cache: false
			}).done(function(data) {
				console.log(data)
				alert('The product has been added successfully.');
				Validate.clearFields(form);
			});	
      	}
	},
	fetch : () => {
		Request.ajax('products/fetch','#product-container','',true);
	},
};