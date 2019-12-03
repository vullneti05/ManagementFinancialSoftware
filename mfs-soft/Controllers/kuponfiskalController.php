<?php
require_once "../Models/Connection.php";
require_once "../Models/furnizimiModels.php";
require_once "TemplateController.php";
session_start();
$count = 0;
$shfaqkuponatfiskal = furnizimiModels::shfaqkuponatfiskal();
foreach ($shfaqkuponatfiskal as $shfaqkuponat) {
    $count = $count + 1;
    echo '
			<tr id="shfaqi">
				<td>' . $count . '</td>
					<td >' . $shfaqkuponat['emri'] . '</td>
					<td >' . $shfaqkuponat['qmimi'] . '</td>
					<td >' . $shfaqkuponat['sasia'] . '</td>
					<td >' . $shfaqkuponat['vlera'] . '</td>
				<td class="options1">
					<i class="far fa-times-circle custom-delete ml-4 mr-3" style="cursor:pointer" onclick="fshikuponin(' . $shfaqkuponat['produkti_id'] . ')"></i>
		     	</td>
				</tr>
			';
}
if (isset($_GET['fshikuponinid'])) {
    $fshikuponinid = $_GET['fshikuponinid'];
    $results = furnizimiModels::fshirjaekuponit($fshikuponinid);
}
?>