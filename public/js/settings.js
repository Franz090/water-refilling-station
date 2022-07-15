$(function(){
	Settings.fetch();
   	Settings.index();
   	Validate.notFocus();
})

let Settings = {
   	index: () => {
   		
   		$(document).on('click', '#update-settings', function(e){
   			e.preventDefault();
   			Settings.change();
		});
    },
    fetch: () => {
    	Request.ajax('account/fetch', '.forum-container'); 
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
						location.href = server + 'account/sign-out';
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