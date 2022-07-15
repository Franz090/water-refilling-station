$(function(){
	Transactions.index();
    Transactions.fetch();
});

let Transactions = {
	index: () => {

		$('#search-btn').click(function(){
			Transactions.fetch();
		});

		$('.sorting').change(function(){
			Transactions.fetch();
		});

		$('.sort-key').keypress(function(e){
			let key = e.which;
   			if (key == 13) { Transactions.fetch(); }
		});

		$('.sort-key').keyup(function(){
			if ($(this).val() == "") { Transactions.fetch(); }
		});
	},
	fetch : () => {
		let params = Serialize.form('#wildcards');
		Request.ajax('transactions/fetch','#table-panel',params,true);
	},
};