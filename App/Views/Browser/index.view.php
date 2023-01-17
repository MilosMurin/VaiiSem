<?php

use App\Helpers\Cube\TopCubeSvg;

?>

<link rel="stylesheet" href="../../../public/css/cards.css">
<div class="row d-flex align-items-center justify-content-center">

	<div class="col-lg-3 col-sm-4 mx-auto text-center mt-5">
		<a href="?c=browser&a=browse&s=3&t=OLL">
			<div class="mycard py-4 maxMinWidth">
				<p class="fw-bold fs-5">3x3 OLL</p>
                <?= (new TopCubeSvg("7,7,7,7,6,7,7,7,7,7,6,7,6,6,6,7,6,7,6,6,6"))->getSVG(100, 100); ?>
			</div>
		</a>
	</div>

	<div class="col-lg-3 col-sm-4 mx-auto text-center mt-5">
		<a href="?c=browser&a=browse&s=3&t=PLL">
			<div class="mycard py-4 maxMinWidth">
				<p class="fw-bold fs-5">3x3 PLL</p>
                <?= (new TopCubeSvg("6,6,6,6,6,6,6,6,6,2,2,3,4,5,2,3,4,4,5,3,5"))->getSVG(100, 100); ?>
			</div>
		</a>
	</div>

	<div class="col-lg-3 col-sm-4 mx-auto text-center mt-5">
		<a href="?c=browser&a=browse&s=3&t=VW">
			<div class="mycard py-4 maxMinWidth">
				<p class="fw-bold fs-5">3x3 VW</p>
                <?= (new TopCubeSvg("1,1,1,1,1,1,1,1,1,3,4,5,6,7,1,2,3,4,5,6,7"))->getSVG(100, 100); ?>
			</div>
		</a>
	</div>
</div>
