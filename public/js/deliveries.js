$(function(){
	Deliveries.index();
    Deliveries.fetch();
});

let Deliveries = {
	index: () => {

		$('#search-btn').click(function(){
			Deliveries.fetch();
		});

		$('.sorting').change(function(){
			Deliveries.fetch();
		});

		$('.sort-key').keypress(function(e){
			let key = e.which;
   			if (key == 13) { Deliveries.fetch(); }
		});

		$('.sort-key').keyup(function(){
			if ($(this).val() == "") { Deliveries.fetch(); }
		});

		$(document).on('click','.change-status-btn', function(){
			let params = {};
			params['orderID'] = $(this).val();
			params['status'] = $(this).data('status');
			
			$.when(Request.ajax('deliveries/change-status', '',params)).done(function(data){
				console.log(data)
				Deliveries.fetch();
			});
		})
	},
	fetch : () => {
		let params = Serialize.form('#wildcards');
		Request.ajax('deliveries/fetch','#table-panel',params,true);
	},
};