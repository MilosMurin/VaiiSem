<?php

use App\Helpers\Cube\TopCubeSvg;

$cube = new TopCubeSvg("1,2,3,4,5,6,7,1,2,3,4,5,6,7,1,2,3,4,5,6,7");
?>

<?= $cube->getSVG();?>
