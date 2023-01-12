<?php

use App\Helpers\Cube\TopCubeSvg;

?>

<table style="margin: 0 auto">
    <?php for ($i = 0; $i < $_GET["s"]; $i++) { ?>
        <tr>
            <td>
                <p><?= $_GET["t"];?></p>
            </td>
            <td>
                <?= (new TopCubeSvg("1,2,3,4,5,6,7,1,2,3,4,5,6,7,1,2,3,4,5,6,7"))->getSVG(100, 100);?>
            </td>
        </tr>
    <?php } ?>
</table>
