<?php
require_once "../Models/Connection.php";
require_once "../Models/furnizimiModels.php";
require_once "TemplateController.php";
session_start();
$shitjet = furnizimiModels::shfaqshitjet();
$count = 0;
foreach ($shitjet as $shitja) {
    $count = $count + 1;
    echo '
			<tr>
				<td >' . $count . '</td>
				<td >' . $shitja['nrserik'] . '</td>
				<td >' . $shitja['emri'] . '</td>
				<td >' . $shitja['qmimi'] . ' €</td>
				<td >' . $shitja['sasia'] . '</td>
				<td >' . $shitja['vlera'] . '</td>
				<td class="options"><i class="far fa-times-circle custom-delete ml-2" onclick="fshishitjen(' . $shitja['produkti_id'] . ')"></i></td>
			</tr>

	';
}
?>