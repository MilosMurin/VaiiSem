<?php
/** @var Array $data */
?>
<div id="message" class="text-center text-danger mb-3">
    <?= @$data['message'] ?>
</div>
<form class="mt-5" method="post" action="?c=upload&a=upload">
	<div class="row mb-3 mt-4 mx-auto w-50">
		<label for="size" class="col-sm form-label text-sm-end text-center">Size of the cube:</label>

		<select name="size" id="size" class="col-sm">
			<option selected value="3x3">3x3</option>
		</select>

	</div>
	<div class="row mb-3 mt-4 mx-auto w-50">
		<label for="type" class="col-sm form-label text-sm-end text-center">Type of the algorithm:</label>

		<select name="type" id="type" class="col-sm">
			<option value="PLL">PLL</option>
			<option value="OLL">OLL</option>
			<option value="VW">VW</option>
		</select>

	</div>

	<div class="row mb-3 mt-4 mx-auto w-50">
		<label for="algId" class="col-sm form-label text-sm-end text-center">Insert algorithm:</label>
		<select name="algId" id="algId" class="col-sm">

		</select>
	</div>

	<div class="row mb-3 mt-4 mx-auto w-75">
		<label for="alg" class="col-sm form-label text-sm-end text-center">Insert algorithm:</label>
		<input class="col-sm" type="text" id="alg" name="alg" placeholder="Algorithm" required>
	</div>

<!--	TODO: fix button not fully visible on small screens-->
	<div class="row mb-3 mt-4 mx-auto w-25 d-flex align-items-center justify-content-center">
		<button id="submitUpload" type="submit" class="btn btn-primary">Upload</button>
	</div>
</form>
<script src="../../../public/js/upload.js"></script>