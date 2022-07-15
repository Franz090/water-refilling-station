<form id="sign-up-form" class="d-flex border p-5 shadow-sm">
	<img src="<?=IMG_PATH?>sign-up.gif" alt="">
	<div class="d-flex flex-column right-panel justify-content-center ps-5">
		<h4 class="text-center">SIGN UP</h4>

		<?php 
		$c_sign_up = '/water-refilling-station/customer/sign-up';
		$curr_url = $_SERVER['REQUEST_URI'];

		if($curr_url == $c_sign_up):
		?>
		<label for="">Name</label>
		<input type="text" name="fullname" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
		<?php endif; ?>

		<label for="">Username</label>
		<input type="text" name="username" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">

		<label for="">Password</label>
		<input type="password" name="password" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">

		<label for="">Confirm Password</label>
		<input type="password" name="confirmPassword" class="form-control mb-4 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">

		<div class="d-flex justify-content-center" id="a-loader"></div>

		<div class="d-flex justify-content-center">
			<button id="sign-up-btn" class="btn btn rounded-pill">Register</button>
		</div>
	</div>
</form>