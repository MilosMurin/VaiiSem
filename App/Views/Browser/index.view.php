<?php

use App\Helpers\Cube\TopCubeSvg;

?>

<table style="margin: 0 auto">
	<tr>
		<td>
			<a href="?c=browser&a=browse&s=2&t=OLL">
                <?= (new TopCubeSvg("1,1,1,1,1,1,1,1,1,3,4,5,6,7,1,2,3,4,5,6,7"))->getSVG(100, 100); ?>
			</a>
		</td>
		<td>
			<a href="?c=browser&a=browse&s=3&t=PLL">
                <?= (new TopCubeSvg("2,2,2,2,2,2,2,2,2,3,4,5,6,7,1,2,3,4,5,6,7"))->getSVG(100, 100); ?>
			</a>
		</td>
	</tr>
</table>
