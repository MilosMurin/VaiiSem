<?php
/** @var string $contentHTML */

/** @var IAuthenticator $auth */

use App\Config\Configuration;
use App\Core\IAuthenticator;

?>
<!DOCTYPE html>
<html lang="sk">
<head>
	<title><?= Configuration::APP_NAME ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
	        crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
	        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
	        crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
	        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
	        crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../../public/css/root.css">
	<link rel="stylesheet" href="../../public/css/index.css">
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark text-white">
		<a class="navbar-brand" href="?c=home">
			<img class="logo" src="../../public/res/cube.png" alt="logo">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="?c=browser">Algorithm browser</a>
				</li>
                <?php if ($auth->isLogged()) { ?>
					<li class="nav-item">
						<a class="nav-link" href="?c=upload">Algorithm uploader</a>
					</li>
                <?php } ?>
			</ul>
		</div>
        <?php if ($auth->isLogged()) { ?>
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" href="?c=user">
						User: <b><?= $auth->getLoggedUserName() ?></b>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?c=home&a=logout">Log out</a>
				</li>
			</ul>
        <?php } ?>
	</nav>
	<div class="container-fluid mt-3">
		<div class="web-content">
            <?= $contentHTML ?>
		</div>
	</div>
</body>
</html>
