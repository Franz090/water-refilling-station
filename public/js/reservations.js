$(function(){
	Reservations.index();
    Reservations.fetch();
});

let Reservations = {
	index: () => {

		$('#search-btn').click(function(){
			Reservations.fetch();
		});

		$('.sorting').change(function(){
			Reservations.fetch();
		});

		$('.sort-key').keypress(function(e){
			let key = e.which;
   			if (key == 13) { Reservations.fetch(); }
		});

		$('.sort-key').keyup(function(){
			if ($(this).val() == "") { Reservations.fetch(); }
		});
	},
	fetch : () => {
		let params = Serialize.form('#wildcards');
		Request.ajax('reservations/fetch','#table-panel',params,true);
	},
};