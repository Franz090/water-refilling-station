<?php 
$of_active = ($data['el_class'] == 'of_active') ? 'active' : '';
$th_active = ($data['el_class'] == 'th_active') ? 'active' : '';
$as_active = ($data['el_class'] == 'as_active') ? 'active' : '';
?>

<nav class="d-flex justify-content-end p-4">
	<a href="<?=URL?>customer/order-form" class="me-3 text-decoration-none <?=$of_active?>">Order Form</a>
	<a href="<?=URL?>customer/transaction-history" class="me-3 text-decoration-none <?=$th_active?>">Transaction History</a>
	<a href="<?=URL?>customer/settings" class="me-3 text-decoration-none <?=$as_active?>">Account Settings</a>
	<a href="<?=URL?>customer/sign-out" class="text-decoration-none">Logout</a>
</nav>