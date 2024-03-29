<?php
/** @var Array $data */

$user = $data["user"];
?>

<div id="message" class="text-center text-danger mb-3">
    <?= @$data['message'] ?>
</div>

<form id="userForm" method="post" action="?c=user&a=update">
	<div class="row mb-3 mt-4 mx-auto w-50 text-center">
		<h3>Edit user info</h3>
	</div>
	<div class="row mb-3 mt-4 mx-auto w-25">
		<label for="name" class="col-sm form-label">Username:</label>
		<input class="col-sm" type="text" name="name" id="name" value="<?= $user->getName() ?>">
	</div>

	<div class="row mb-3 mt-4 mx-auto w-25">
		<label for="email" class="col-sm form-label">Email:</label>
		<input class="col-sm" type="email" name="email" id="email" value="<?= $user->getEmail() ?>">
	</div>
</form>
<div class="row mb-3 mt-4 mx-auto w-50 d-flex align-items-center justify-content-center">
	<button id="submit" class="btn btn-primary col-3 me-2">Save changes</button>
</div>

<form id="changeForm" method="post" action="?c=user&a=change">
	<div class="row mb-3 mt-4 mx-auto w-50 text-center">
		<h3>Change password</h3>
	</div>

	<div class="row mb-3 mt-4 mx-auto w-25">
		<label for="oldPswd" class="col-sm form-label">Old password:</label>
		<input class="col-sm" type="password" name="oldPswd" id="oldPswd">
	</div>

	<div class="row mb-3 mt-4 mx-auto w-25">
		<label for="newPswd" class="col-sm form-label">New password:</label>
		<input class="col-sm" type="password" name="newPswd" id="newPswd">
	</div>

	<div class="row mb-3 mt-4 mx-auto w-25">
		<label for="newPswdRpt" class="col-sm form-label">Repeat new password:</label>
		<input class="col-sm" type="password" id="newPswdRpt">
	</div>
</form>
<div class="row mb-3 mt-4 mx-auto w-50 d-flex align-items-center justify-content-center">
	<button id="change" class="btn btn-primary col-3 me-2">Change password</button>
	<button id="delete" class="btn btn-danger col-3">Delete account</button>
</div>

<script src="../../../public/js/user.js"></script>