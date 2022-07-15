$(function(){
	App.index();
	Validate.notFocus();
})

let App = {
	index: () => {

		$('#sign-in-btn').click(function(e){
			e.preventDefault();
			App.signIn();
		});

		$('#sign-up-btn').click(function(e){
			e.preventDefault();
			App.signUp();
		});
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
					location.href = server + 'deliveries';
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
				params['account_type'] = 'admin';

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
};