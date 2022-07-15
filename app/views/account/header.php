<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Water Refilling Station Management System | <?=$data['curr_page']?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	<?php foreach($data['css_path'] as $key=>$value): ?>
    <link rel="stylesheet" href="<?= $value; ?>">
    <?php endforeach; ?>
</head>
<body class="overflow-hidden">
	<div class="main d-flex flex-column overflow-hidden" style="height: 100vh">
		<div class="d-flex justify-content-between align-items-center nav-bar overflow-hidden">
			<img src="<?=IMG_PATH?>logo.png" alt="">
			<?php
				$sign_in = ($data['el_class'] == 'a_sign_in') ? 'active' : '';
				$sign_up = ($data['el_class'] == 'a_sign_up') ? 'active' : '';

				$c_sign_in = '/water-refilling-station/customer/sign-in';
				$c_sign_up = '/water-refilling-station/customer/sign-up';

				$a_sign_in = '/water-refilling-station/account/sign-in';
				$a_sign_up = '/water-refilling-station/account/sign-up';

				$curr_url = $_SERVER['REQUEST_URI'];
			?>
			<div class="d-flex">

				<?php if($curr_url == $c_sign_in || $curr_url == $c_sign_up): ?>
				<a href="<?=URL?>customer/sign-in" class="text-decoration-none me-3 btn rounded-pill border <?=$sign_in?>">Sign In</a>
				<a href="<?=URL?>customer/sign-up" class="text-decoration-none btn rounded-pill border <?=$sign_up?>">Sign Up</a>
				<?php endif; ?>

				<?php if($curr_url == $a_sign_in || $curr_url == $a_sign_up): ?>
				<a href="<?=URL?>account/sign-in" class="text-decoration-none me-3 btn rounded-pill border <?=$sign_in?>">Sign In</a>
				<a href="<?=URL?>account/sign-up" class="text-decoration-none btn rounded-pill border <?=$sign_up?>">Sign Up</a>
				<?php endif; ?>

			</div>
		</div>
		<div class="page-content d-flex align-items-center justify-content-center overflow-hidden" style="height: 92vh">