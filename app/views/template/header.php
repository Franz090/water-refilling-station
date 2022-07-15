<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Water Refilling Station Management System | <?=$data['curr_page']?></title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="<?=CSS_PATH?>styles.min.css">
	
	<?php foreach($data['css_path'] as $key=>$value): ?>
    <link rel="stylesheet" href="<?= $value; ?>">
    <?php endforeach; ?>
</head>
<body>
	<div class="main d-flex" style="height: 100vh">
		<div class="sidebar d-flex p-4 align-items-stretch">
			<div class="d-flex flex-column p-2 menu">
				<img src="<?=IMG_PATH?>logo.png" alt="logo">

				<?php
					$mbtn1 = ($data['el_class'] == 'mbtn1') ? 'curr-active' : '';
					$mbtn2 = ($data['el_class'] == 'mbtn2') ? 'curr-active' : '';
					$mbtn3 = ($data['el_class'] == 'mbtn3') ? 'curr-active' : '';
					$mbtn4 = ($data['el_class'] == 'mbtn4') ? 'curr-active' : '';
					$mbtn5 = ($data['el_class'] == 'mbtn5') ? 'curr-active' : '';
					$mbtn6 = ($data['el_class'] == 'mbtn6') ? 'curr-active' : '';
				?>
				<div class="d-flex flex-column pb-5 mt-5">
					<!-- <a href="<?=URL?>dashboard" class="p-3 text-decoration-none <?=$mbtn1?>">
						<i class="fas fa-desktop me-2 text-white"></i>
						<span class="text-white">Dashboard</span>
					</a> -->
					<a href="<?=URL?>deliveries" class="p-3 text-decoration-none <?=$mbtn2?>">
						<i class="fas fa-truck me-2 text-white"></i>
						<span class="text-white">Deliveries</span>
					</a>
					<a href="<?=URL?>reservations" class="p-3 text-decoration-none <?=$mbtn3?>">
						<i class="far fa-file-alt me-2 text-white"></i>
						<span class="text-white">Reservations</span>
					</a>
					<a href="<?=URL?>transactions" class="p-3 text-decoration-none <?=$mbtn4?>">
						<i class="fas fa-chart-line me-2 text-white"></i>
						<span class="text-white">Transactions</span>
					</a>
					<a href="<?=URL?>products/list" class="p-3 text-decoration-none <?=$mbtn5?>">
						<i class="fas fa-shopping-cart me-2 text-white"></i>
						<span class="text-white">Products</span>
					</a>

				</div>
				<div class="d-flex flex-column mt-5 border-top">
					<a href="<?=URL?>account/settings" class="mt-4 p-3 text-decoration-none <?=$mbtn6?>">
						<i class="fas fa-user-circle me-2 text-white"></i>
						<span class="text-white">Account Settings</span>
					</a>
					<a href="<?=URL?>account/sign-out" class="p-3 text-decoration-none">
						<i class="fas fa-sign-out-alt me-2 text-white"></i>
						<span class="text-white">Logout</span>
					</a>
				</div>
			</div>
		</div>
		<div class="page-content">
			
		

			