<?php
/** @var Array $data */

use App\Helpers\Cube\TopCubeSvg;

?>

<!--	TODO: shrink borders, sorting based on learning status-->
<link rel="stylesheet" href="../../../public/css/browse.css">
<div class="row" style="margin: 0 auto">
    <?php for ($i = 0; $i < sizeof($data["algs"]); $i++) { ?>
		<div id="<?= $i ?>" class="mb-3 py-2 myBorder" style="background-color: <?= $data["color"][$i] ?>">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="col-1 px-0 text-center text-sm-end me-3">
					<p class="fs-3 fw-bold"><?= $data["algs"][$i]->getName(); ?></p>
				</div>
				<div id="learn_<?=  $data["algs"][$i]->getId() ?>_" class="col-1 minWidthSvg click-learn">
					<?php
						$cube = new TopCubeSvg($data["algs"][$i]->getPicture());
                        $alg = $data["choice"][$i];
						$first = explode(" ", $alg)[0];
						$start = true;
						switch ($first) {
							case "y'":
								$cube->setRotation(270);
								break;
							case "y":
                                $cube->setRotation(90);
								break;
							case "y2":
                                $cube->setRotation(180);
								break;
							default:
								$start = false;
								break;
                        }
						echo $cube->getSVG(100, 100);
					?>
				</div>
				<div class="col-sm-4 text-center ms-md-2 ms-0 mt-md-0 mt-2 maxAlgWidth">
					<a href="?c=browser&a=show&alg=<?= $data["algs"][$i]->getId() ?>">
						<p class="fw-bold">
							<?php
								if ($start) {
									$space = strpos($alg, " ");
									echo substr($alg, $space);
                                } else {
                                    echo $alg;
                                }
							?>
						</p>
					</a>
				</div>
			</div>
		</div>
    <?php } ?>
</div>
<script src="../../../public/js/browse.js"></script>
