<?php
/** @var Array $data */

use App\Helpers\Cube\TopCubeSvg;

?>

<div class="row">
    <?= (new TopCubeSvg($data["alg"]->getPicture()))->getSVG(200, 200); ?>
</div>

<!--TODO: voting, deleting the ones you uploaded, selecting-->

<div class="row mt-5">
    <?php for ($i = 0; $i < sizeof($data["choices"]); $i++) {
        $yellow = $data["choices"][$i]->getId() == $data["chosen"] ?>
		<div class="row text-center m-0 d-flex align-items-center justify-content-center"
		     style="background-color:<?php if ($yellow) { ?> yellow <?php } else { ?> white <?php } ?>">
			<p class="w-50"><?= $data["choices"][$i]->getAlgorithm(); ?></p>
		</div>
    <?php } ?>
</div>
