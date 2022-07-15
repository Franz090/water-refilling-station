$(function(){
    Customer.index();
	Validate.notFocus();
	Customer.deliveryDetails();
});

let Customer = {
	index: () => {

		$('#submit-order').click(function(e){
			e.preventDefault();
			Customer.create_order();
		});

		$("input[name$='order_type']").click(function() {
	        let con = $(this).val();

	        if(con == 'for_delivery'){
	        	Customer.deliveryDetails();
	        }else{
	        	Customer.reservationDetails();
	        }
	    });

		/*modal*/
	    $(document).on('click','.product', function(e){
	    	e.preventDefault();
	    	$('.clear-order-val').val('');

	    	let selected = $(this);
	    	selected.addClass('p-active');
	    	selected.siblings().removeClass('p-active');
	    	let dataID = selected.data('id');
	    	let data_name = selected.data('name');

			$('#product-id').val(dataID);
			$('#container-type').val(data_name);
	    });

	    $('.confirm-product-btn').click(function(e){
			e.preventDefault();
			$('#staticBackdrop').modal('hide');
		});
		/*end modal*/

		$('#sign-in-btn').click(function(e){
			e.preventDefault();
			Customer.signIn();
		});

		$(document).on('click', '#sign-up-btn', function(e){
			e.preventDefault();
			Customer.signUp();
		})

		$(document).on('click', '#container-type', function(e){
			e.preventDefault();
			Customer.productList();
		})

		$(document).on('click', '#update-settings', function(e){
   			e.preventDefault();
   			Customer.change();
		});
	},
	deliveryDetails : () => {
		Request.ajax('customer/delivery-details','#other-details','',true);
	},
	reservationDetails : () => {
		Request.ajax('customer/reservation-details','#other-details','',true);
	},
	productList: () => {
		Request.ajax('customer/product-list','#modal-body','',true);
	},
	create_order: () => {
		let form = '#order-form';
		Validate.fields(form);
		let errLenght = $(`${form} .empty-fields`).length;

		if(errLenght == 0)
		{
			let params = Serialize.form(form);
		
			$.when(Request.ajax('customer/create-order', '#loading-form',params, true)).done(function(data){
				console.log(data);
				if(data['responsecode'] == 200){
					Validate.clearFields(form);
					alert(data['responsemsg']);
				}
			});
		}
	},
	signIn: () => {
		let form = '#sign-in-form';
		Validate.fields(form);
		let errLenght = $(`${form} .empty-fields`).length;

		if(errLenght == 0)
		{
			let params = Serialize.form(form);
			
			$.when(Request.ajax('account/login','#a-loader',params,true)).done(function(data){
				console.log(data);
				if(data['responsecode'] !=  -1){
					Validate.clearFields(form);
					location.href = server + 'customer/order-form';
				}else{
					alert(data['responsemsg']);
				}
			});
		}
	},
	signUp: () => {
		let form = '#sign-up-form';
		Validate.fields(form);
		let errLenght = $(`${form} .empty-fields`).length;
		let password = $(`${form} input[name="password"]`).val();
		let c_password = $(`${form} input[name="confirmPassword"]`).val();

		if(errLenght == 0)
		{
			if(password==c_password)
			{
				let params = Serialize.form(form);
				params['account_type'] = 'customer';

				$.when(Request.ajax('account/create','#a-loader',params,true)).done(function(data){
					console.log(data)
					if(data['responsecode'] == 200){
						Validate.clearFields(form);
						alert(data['responsemsg']);
					}else{
						alert(data['responsemsg']);
					}
				});
			}
			else{
				alert('Please make sure your passwords match.'); 
			}
		}
	},
	change: () => {
   		let form = '#settings-form';
		Validate.fields(form);
		let errLenght = $(`${form} .empty-fields`).length;
		let n_password = $(`${form} input[name="newPassword"]`).val();
		let c_password = $(`${form} input[name="confirmPassword"]`).val();

		if(errLenght == 0)
		{
			if(n_password==c_password)
			{
				let params = Serialize.form(form);

				$.when(Request.ajax('account/update-account-info','',params)).done(function(data){
					console.log(data)
					if(data['responsecode'] !=  -1){
						Validate.clearFields(form);
						alert(data['responsemsg']);
						location.href = server + 'customer/sign-out';
					}else{
						alert(data['responsemsg']);
					}
				});
			}
			else{
				alert('Please make sure your passwords match.'); 
			}
		}
    }

};