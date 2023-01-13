<?php
/** @var Array $data */

use App\Helpers\Cube\TopCubeSvg;

?>

<div class="row">
    <?= (new TopCubeSvg($data["alg"]->getPicture()))->getSVG(200, 200); ?>
</div>

<div class="row">
    <?php for ($i = 0; $i < sizeof($data["choices"]); $i++) { ?>
		<div class="row">
			<div class="col" style="background-color: <?php if ($data["choices"][$i]->getId() == $data["chosen"]) { ?> yellow <?php } else { ?> white ">
				<p><?= $data["choices"][$i]->getAlgorithm(); ?></p>
			</div>
		</div>
    <?php } } ?>
</div>
