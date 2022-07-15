<?php $user_info = $_SESSION['account_info']; ?>
<div class="d-flex flex-column p-5 products-container">
	<div class="d-flex justify-content-between mb-5 search-bar">
		<h3>ACCOUNT SETTINGS</h3>
	</div>

	<div class="table-panel d-flex">
		<form class="d-flex flex-column border p-5 ms-5" id="settings-form">
			<input type="hidden" name="accountId" value="<?=$user_info['accountId']?>" class="text-field required">
			<label for="" class="mb-1">Username</label>
			<input type="text" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="username" value="<?=$user_info['username']?>" id="username">

			<!-- <label for="" class="mb-1">Current Password</label>
			<input type="password" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="password" autocomplete="off"> -->

			<label for="" class="mb-1">New Password</label>
			<input type="password" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="newPassword" autocomplete="off">

			<label for="" class="mb-1">Confirm New Password</label>
			<input type="password" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="confirmPassword" autocomplete="off">

			<div class="d-flex justify-content-end mt-5">
				<button type="button" class="btn" id="update-settings">Save changes</button>
			</div>
		</form>
	</div>
</div>