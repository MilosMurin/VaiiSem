<?php
/** @var Array $data */

use App\Helpers\Cube\TopCubeSvg;

?>

<div class="row" style="margin: 0 auto">
    <?php for ($i = 0; $i < sizeof($data["algs"]); $i++) { ?>
<!--	TODO: add borders, painting background based on learning status, align stuff correctly-->
		<div class="row">
			<div class="col-5" style="text-align: right">
				<p><?= $data["algs"][$i]->getName(); ?></p>
			</div>
			<div class="col-1" style="margin 0 auto">
                <?= (new TopCubeSvg($data["algs"][$i]->getPicture()))->getSVG(100, 100); ?>
			</div>
			<div class="col-6">
				<a href="?c=browser&a=show&alg=<?= $data["algs"][$i]->getId() ?>"  style="text-decoration: none; color: black; font-weight: bold">
					<p>
                        <?= $data["choice"][$i]->getAlgorithm(); ?>
					</p>
				</a>
			</div>
		</div>
    <?php } ?>
</div>
