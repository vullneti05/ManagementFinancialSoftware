<?php
//Thirrja e Konektimit me databaze , pyetesoreve te Regjistrimit te mallit the TemplateControlleri-t (root-ave)
require_once "../Models/Connection.php";
require_once "../Models/regjistrimimallitModels.php";
require_once "TemplateController.php";
session_start();
if (isset($_POST['generate'])) {
    $text = $_POST['barcode'];
    echo "<br><img alt='testing' src='Views/modules/CMS/barcode?codetype=Code39&size=40&text=" . $text . "&print=true'/>";
}
if (isset($_POST['barkod'])) {
    $barkodi = $_POST['barkod'];
    $artikulli = $_POST['artikulli'];
    $qmimishitjes = $_POST['qmimishitjes'];
    $njesia = $_POST['njesia'];
    $tvsh = $_POST['tvsh'];
    $sasiaminimale = $_POST['sasiaminimale'];
    $pershkrimi = $_POST['pershkrimi'];
    $rezultatet = regjistrimimallitModels::regjistromallin($barkodi, $artikulli, $qmimishitjes, $njesia, $tvsh, $sasiaminimale, $pershkrimi);
    echo json_encode($rezultatet);
}
if (isset($_POST['regjistrimimallitID'])) {
    $id = $_POST['regjistrimimallitID'];
    $perditesoartikulli = $_POST['ndryshoartikulli'];
    $perditesobarkod = $_POST['ndryshobarkod'];
    $perditesoqmimishitjes = $_POST['ndryshoqmimishitjes'];
    $perditesosasiaminimale = $_POST['ndryshosasiaminimale'];
    $perditesonjesia = $_POST['ndryshonjesia'];
    $rezultatet = regjistrimimallitModels::perditesomallin($id, $perditesoartikulli, $perditesobarkod, $perditesoqmimishitjes, $perditesosasiaminimale, $perditesonjesia);
    echo json_encode($rezultatet);
}
if (isset($_GET['regjistrimimallitID'])) {
    $regjistrimimallitID = $_GET['regjistrimimallitID'];
    $results = regjistrimimallitModels::fshimallin($regjistrimimallitID);
}
$shfaqrezultatet = regjistrimimallitModels::shfaqmallin();
foreach ($shfaqrezultatet as $key => $malliregjistruar) {
    $key+= 1;
    echo '<tr>
		<td>' . $key . '</td>
		<td>' . $malliregjistruar['emriproduktit'] . '</td>
		<td>' . $malliregjistruar['barkodi'] . '</td>
		<td>' . $malliregjistruar['qmimishitjes'] . ' €</td>
		<td>' . $malliregjistruar['sasiaminimale'] . '</td>
		<td>' . $malliregjistruar['njesia'] . '</td>
		<td class="options">
		<a href="#" onclick="barkod(' . $malliregjistruar['id'] . ')" data-toggle="modal" data-target="#barkodi">
		<img src="Views/assets/images/Icon feather-bar-chart.png" alt="">
		</a>

		<a href="" onclick="ndryshogjistriminemallit(' . $malliregjistruar['id'] . ')" data-toggle="modal" data-target="#exampleModal">
		<i class="far fa-edit ml-2 text-primary"  ></i>
		</a>
		<i class="far fa-times-circle ml-2"  onclick="fshiregjistriminemallit(' . $malliregjistruar['id'] . ')"></i>
		</td>
	</tr>';
}
?>

