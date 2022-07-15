<?php require_once 'nav.php'; ?>

<?php $user_info = $_SESSION['account_info']; ?>

<div class="d-flex justify-content-center" id="account-settings">
	<form class="d-flex flex-column border p-5" id="settings-form">
		<input type="hidden" name="accountID" value="<?=$user_info['accountId']?>" class="text-field required">

		<label for="" class="mb-1">Name</label>
		<input type="fullname" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="fullname" autocomplete="off" value="<?=$user_info['fullname']?>">

		<label for="" class="mb-1">Username</label>
		<input type="text" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="username" value="<?=$user_info['username']?>">

		<label for="" class="mb-1">New Password</label>
		<input type="password" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="newPassword" autocomplete="off">

		<label for="" class="mb-1">Confirm New Password</label>
		<input type="password" class="form-control mb-3 text-field required can-clear" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="confirmPassword" autocomplete="off">

		<div class="d-flex justify-content-end mt-5">
			<button type="button" class="btn" id="update-settings">Save changes</button>
		</div>
	</form>
</div>