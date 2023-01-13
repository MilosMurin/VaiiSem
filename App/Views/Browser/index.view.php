<?php

use App\Helpers\Cube\TopCubeSvg;

?>

<table style="margin: 0 auto">
	<tr style="text-align: center; font-weight: bold">
<!--		TODO: change to cols and rows (card style)-->
		<td>
			<a href="?c=browser&a=browse&s=2&t=OLL" style="text-decoration: none; color: black">
				<p>2x2 OLL</p>
                <?= (new TopCubeSvg("1,1,1,1,1,1,1,1,1,3,4,5,6,7,1,2,3,4,5,6,7"))->getSVG(100, 100); ?>
			</a>
		</td>
		<td>
			<p>3x3 OLL</p>
			<a href="?c=browser&a=browse&s=3&t=OLL">
                <?= (new TopCubeSvg("7,7,7,7,6,7,7,7,7,7,6,7,6,6,6,7,6,7,6,6,6"))->getSVG(100, 100); ?>
			</a>
		</td>
		<td>
			<p>3x3 PLL</p>
			<a href="?c=browser&a=browse&s=3&t=PLL">
                <?= (new TopCubeSvg("6,6,6,6,6,6,6,6,6,2,2,3,4,5,2,3,4,4,5,3,5"))->getSVG(100, 100); ?>
			</a>
		</td>
	</tr>
</table>
