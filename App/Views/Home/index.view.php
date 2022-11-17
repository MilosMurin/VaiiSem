<div class="container-fluid">

	<div class="row pt-5">
		<div class="col-md-6 pt-5 text-center d-flex align-items-center justify-content-center">
			<img class="w-75 center-block img-fluid no-select min-w" draggable="false" src="../../../public/res/crafting_table.png"
			     alt="Crafting table">
			<a class="on-top" href="?c=home">
<!--				ccMain-->
				<img class="max-w" src="../../../public/res/calculator.png" alt="Calculator"
				     data-toggle="tooltip" data-placement="top" title="Open crafting calculator">
			</a>
		</div>

		<div class="col-md-6 pt-5 text-center">
			<h3 class="h3 mt-5">Login to customize crafting recipes!</h3>

			<form>
				<div class="row mb-3 mt-3 mx-auto w-75">
					<label for="name" class="col-sm form-label my-form-label">Username:</label>
					<input type="text" class="col-sm form-control" id="name" placeholder="Enter username"
					       name="name">
				</div>
				<!--					<div class="row mb-3 mt-3 mx-auto w-75">-->
				<!--						<label for="email" class="col-sm form-label my-form-label">Email:</label>-->
				<!--						<input type="email" class="col-sm form-control" id="email" placeholder="Enter email" name="email">-->
				<!--					</div>-->
				<div class="row mb-3 mx-auto w-75">
					<label for="pwd" class="col-sm form-label my-form-label">Password:</label>
					<input type="password" class="col-sm form-control" id="pwd" placeholder="Enter password"
					       name="pswd">
				</div>
				<div class="form-check mb-3">
					<label class="form-check-label">
						<input class="form-check-input" type="checkbox" name="remember"> Remember me
					</label>
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>

			<p class="pt-3">Don't have an account <a href="#">create</a> one.</p>
		</div>
	</div>

</div>