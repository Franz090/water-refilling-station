<form id="sign-in-form" class="d-flex border p-5 shadow-sm">
	<img src="<?=IMG_PATH?>sign-in.gif" alt="">
	<div class="d-flex flex-column right-panel justify-content-center ps-5">
		<h4 class="text-center">SIGN IN</h4>
		<label for="">Username</label>
		<input type="text" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="username">

		<label for="">Password</label>
		<input type="password" name="password"  class="form-control mb-4 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" autocomplete="off">

		<!-- <a href="" class="mb-4">Forgot your password?</a> -->

		<div class="d-flex justify-content-center" id="a-loader"></div>

		<div class="d-flex justify-content-center">
			<button id="sign-in-btn" class="btn btn rounded-pill">Login</button>
		</div>
	</div>
</form>