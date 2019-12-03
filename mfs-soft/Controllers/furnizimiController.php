<?php
require_once "../Models/Connection.php";
require_once "../Models/furnizimiModels.php";
require_once "TemplateController.php";
session_start();
if (isset($_POST['emertimimallit1']) && isset($_POST['emrifurnitorit1'])) {
    $emertimimallit1 = $_POST['emertimimallit1'];
    $qmimiblerjes1 = $_POST['qmimiblerjes1'];
    $qmimishitjes1 = $_POST['qmimishitjes1'];
    $sasia1 = $_POST['sasia1'];
    $shifrafatures1 = $_POST['shifrafatures1'];
    $emrifurnitorit1 = $_POST['emrifurnitorit1'];
    $koha1 = $_POST['koha1'];
    $shfrytezuesi1 = $_SESSION['pseudonimi'];
    $rezultatet = furnizimiModels::regjistrofurnizimin1($emertimimallit1, $qmimiblerjes1, $qmimishitjes1, $sasia1, $shifrafatures1, $emrifurnitorit1, $koha1, $shfrytezuesi1);
    echo json_encode($rezultatet);
}
if (isset($_POST['emertimimallit']) && isset($_POST['emrifurnitorit'])) {
    $emertimimallit = $_POST['emertimimallit'];
    $qmimiblerjes = $_POST['qmimiblerjes'];
    $qmimishitjes = $_POST['qmimishitjes'];
    $sasia = $_POST['sasia'];
    $shifrafatures = $_POST['shifrafatures'];
    $emrifurnitorit = $_POST['emrifurnitorit'];
    $koha = $_POST['koha'];
    $shfrytezuesi = $_SESSION['pseudonimi'];
    $rezultatet = furnizimiModels::regjistrofurnizimin($emertimimallit, $qmimiblerjes, $qmimishitjes, $sasia, $shifrafatures, $emrifurnitorit, $koha, $shfrytezuesi);
    echo json_encode($rezultatet);
}
if (isset($_POST['pasiv'])) {
    $pasiv = $_POST['pasiv'];
    $mbylljaefatures = furnizimiModels::mbyllfaturen($pasiv);
    echo json_encode($pasive);
}
$shfaqjafaturave = furnizimiModels::shfaqfaturataktive();
$count = 0;
foreach ($shfaqjafaturave as $faturataktive) {
    $count = $count + 1;
    $vlerablerse = $faturataktive['qmimiblerjes'] * $faturataktive['sasia'];
    $vlerashitse = $faturataktive['qmimishitjes'] * $faturataktive['sasia'];
    echo '
			<tr>
			<td>' . $count . '</td>
			<td>' . $faturataktive['emriproduktit_fk'] . '</td>
			<td>' . $faturataktive['qmimiblerjes'] . '</td>
			<td>' . $faturataktive['qmimishitjes'] . '$</td>
			<td>' . $faturataktive['sasia'] . '</td>
			<td>' . $vlerablerse . '</td>
			<td>' . $vlerashitse . '</td>
		
			<td>
			<i class="far fa-times-circle ml-2" onclick="fshifurniziminaktiv(' . $faturataktive['id_furnizimi'] . ')"></i>
			</td>
		</tr>
		';
}
if (isset($_POST['editemriproduktitaktiv'])) {
    $editfurnizimiaktiv = $_POST['editfurnizimiaktiv'];
    $editemriproduktitaktiv = $_POST['editemriproduktitaktiv'];
    $editqmimiblerjesaktiv = $_POST['editqmimiblerjesaktiv'];
    $editqmimishitjesaktiv = $_POST['editqmimishitjesaktiv'];
    $editsasiaaktiv = $_POST['editsasiaaktiv'];
    $editvlerablerseaktiv = $editqmimiblerjesaktiv * $editsasiaaktiv;
    $editvlerashitseaktiv = $editqmimishitjesaktiv * $editsasiaaktiv;
    $rezultatet = furnizimiModels::perditesofurniziminaktiv($editfurnizimiaktiv, $editemriproduktitaktiv, $editqmimiblerjesaktiv, $editqmimishitjesaktiv, $editsasiaaktiv);
    echo json_encode($rezultatet);
}
if (isset($_GET['deletefurniziminaktiv'])) {
    $deletefurniziminaktiv = $_GET['deletefurniziminaktiv'];
    $results = furnizimiModels::fshifurniziminaktiv($deletefurniziminaktiv);
}
if (isset($_GET['deletefurniziminpasiv'])) {
    $deletefurniziminpasiv = $_GET['deletefurniziminpasiv'];
    $results = furnizimiModels::deletefurniziminpasiv($deletefurniziminpasiv);
}
if (isset($_POST['search'])) {
    $kerko = $_POST['search'];
    $kerkonedatabaze = furnizimiModels::kerkonedatabase($kerko);
    if ($kerkonedatabaze) {
        $count = 0;
        foreach ($kerkonedatabaze as $rezultati) {
            $count = $count + 1;
            echo '<tr id="reloadsearch"  class="shtomeid" onclick="ideshitjes2(' . $rezultati['id'] . ')"  style="border:none">
						<td ><input type="text" disabled="" id="kerkoemriproduktit" style="background-color:transparent;border:0;box-shadow:none; height:20px;" value="' . $rezultati['emriproduktit'] . '"></td>
						<td ><input type="text" id="kerkoqmimishitjes" style="background-color:transparent;border:0;box-shadow:none; height:20px;" value="' . $rezultati['qmimishitjes'] . '"></td>
						<td ><input type="text"  disabled="" id="kerkobarkodi" style="background-color:transparent;border:0;box-shadow:none; height:20px;" value="' . $rezultati['barkodi'] . '"</td>
						<td >
					<i class="fa fa-plus-circle circleclick" aria-hidden="true"></i>

						</td>
					</tr>';
        }
    
    }
}
if (isset($_GET['ideproduktit'])) {
    $ideproduktit = $_GET['ideproduktit'];
    $rezultati = furnizimiModels::ideproduktit($ideproduktit);
    return $rezultati;
}
if (isset($_POST['kerkoemriproduktit'])) {
    $kohasot = date("Y-m-d");
    $kerkoemriproduktit = $_POST['kerkoemriproduktit'];
    $kerkoqmimishitjes = $_POST['kerkoqmimishitjes'];
    $sasiabuton = $_POST['sasiabuton'];
    $kerkobarkodi = $_POST['kerkobarkodi'];
    $nrserik = $_POST['nrserik'];
    $vlera = $kerkoqmimishitjes * $sasiabuton;
    $shfrytezuesi = $_SESSION['pseudonimi'];
    if($kerkoemriproduktit === 'undefined'){
        echo "nuk mund te fusni mall pa mall";
    }else{
            $rezultati = furnizimiModels::shtoproduktin($kerkoemriproduktit, $kerkoqmimishitjes, $sasiabuton, $vlera, $kerkobarkodi, $shfrytezuesi, $nrserik,$kohasot);
    echo json_encode($rezultati);
    }

}
if (isset($_POST['mbylljaefatures'])) {
    $mbylljaefatures = $_POST['mbylljaefatures'];
    $rezultatet = furnizimiModels::perditesomstatusinefatures($mbylljaefatures);
    echo json_encode($rezultatet);
}
if (isset($_GET['idshitja'])) {
    $idshitja = $_GET['idshitja'];
    $fshirjaeshitjes = furnizimiModels::fshirjaeshitjes($idshitja);
}
if (isset($_POST['shitjameid'])) {
    $shitjameid = $_POST['shitjameid'];
    $sasiabuton = $_POST['sasiabuton'];
    $nrserik = $_POST['nrserik'];
    $rezultati = furnizimiModels::shtoproduktinmeid($shitjameid, $sasiabuton, $nrserik);
    echo json_encode($rezultati);
}
if (isset($_POST['fshikuponinid'])) {
    $fshikuponinid = $_GET['fshikuponinid'];
    $results = furnizimiModels::fshirjaekuponit($fshikuponinid);
}
?>