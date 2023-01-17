<?php
/** @var Array $data */

/** @var IAuthenticator $auth */

use App\Core\IAuthenticator;
use App\Helpers\Cube\TopCubeSvg;

?>

<div class="row">
    <?= (new TopCubeSvg($data["alg"]->getPicture()))->getSVG(200, 200); ?>
</div>

<!--TODO: voting, selecting-->

<div class="row mt-5">
    <?php for ($i = 0; $i < sizeof($data["choices"]); $i++) {
        $lime = $data["choices"][$i]->getId() == $data["chosen"] ? 'lime' : '' ?>
		<div class="row text-center m-0 mb-3 d-flex align-items-center justify-content-center">
            <?php if ($auth->isLogged()) { ?>
				<p id="selection_<?= $data["alg"]->getId() ?>_<?= $data["choices"][$i]->getId() ?>" class="selection col-4 w-50 m-0"
				   style="background-color:<?php echo $lime ?>; cursor: pointer" onclick="onSelectAlgorithm(this)">
                    <?= $data["choices"][$i]->getAlgorithm(); ?></p>
            <?php } else { ?>
	            <p class="col-4 w-50 m-0"><?= $data["choices"][$i]->getAlgorithm(); ?></p>
            <?php } ?>
		</div>
    <?php } ?>
</div>
<?php if ($auth->isLogged()) { ?>
	<script src="../../../public/js/selection.js"></script>
<?php } ?>