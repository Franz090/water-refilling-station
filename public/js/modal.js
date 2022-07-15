$(function(){
	var myModal = document.getElementById('staticBackdrop')

	myModal.addEventListener('shown.bs.modal', function () {
		console.log('Event triggered.');
		$('.clear-order-val').val('');
		Customer.productList();
	})
})