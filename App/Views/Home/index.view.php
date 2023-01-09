<?php
/** @var Array $data */

/** @var IAuthenticator $auth */

use App\Core\IAuthenticator;
use App\Config\Configuration;

?>
	<div class="container-fluid">

		<div class="row pt-5">
			<div class="col-md-6 pt-3 text-center d-flex align-items-center justify-content-center">
				<a href="?c=calculator">
					<img class="w-100 pt-5" src="../../../public/res/calculator.png" alt="Calculator"
					     data-toggle="tooltip" data-placement="top" title="Open crafting calculator">
				</a>
			</div>

            <?php if (!$auth->isLogged()) { ?>
				<div class="col-md-6 pt-3 text-center">
					<h3 id="lgnFromH" class="h3 mt-5"></h3>

					<form id="loginForm" method="post" action="<?= Configuration::LOGIN_URL ?>">
						<div class="row mb-3 mt-3 mx-auto w-75">
							<label for="name" class="col-sm form-label my-form-label">Username:</label>
							<input type="text" class="col-sm form-control" id="name" placeholder="Enter username"
							       name="name" required>
						</div>
						<div class="row mb-3 mt-3 mx-auto w-75 register">
							<label for="email" class="col-sm form-label my-form-label">Email:</label>
							<input type="email" class="col-sm form-control" id="email" placeholder="Enter email"
							       name="email">
						</div>
						<div class="row mb-3 mt-3 mx-auto w-75 register">
							<label for="repEmail" class="col-sm form-label my-form-label">Repeat email:</label>
							<input type="email" class="col-sm form-control" id="repEmail" placeholder="Repeat email">
						</div>
						<div class="row mb-3 mx-auto w-75">
							<label for="pwd" class="col-sm form-label my-form-label">Password:</label>
							<input type="password" class="col-sm form-control" id="pwd" placeholder="Enter password"
							       name="pswd" required>
						</div>
						<div class="row mb-3 mx-auto w-75 register">
							<label for="repPwd" class="col-sm form-label my-form-label">Repeat password:</label>
							<input type="password" class="col-sm form-control" id="repPwd"
							       placeholder="Repeat password">
						</div>
						<div class="form-check mb-3">
							<label class="form-check-label">
								<input class="form-check-input" type="checkbox" name="remember"> Remember me
							</label>
						</div>
						<div id="message" class="text-center text-danger mb-3">
                            <?= @$data['message'] ?>
						</div>
					</form>
					<button id="submit" class="btn btn-primary">Login</button>

					<p id="loginText" class="pt-3"></p>
				</div>
            <?php } else { ?>
	            <div class="col-md-6 pt-5 text-center d-flex align-items-center justify-content-center">
		            <a href="?c=upload">
			            <img class="w-100 pt-5" src="../../../public/res/crafting_add.png" alt="Calculator"
			                 data-toggle="tooltip" data-placement="top" title="Open recipe creator">
		            </a>
	            </div>
			<?php } ?>
		</div>

	</div>

<?php if (!$auth->isLogged()) { ?>
	<script src="../../../public/js/login.js"></script>
<?php } ?>