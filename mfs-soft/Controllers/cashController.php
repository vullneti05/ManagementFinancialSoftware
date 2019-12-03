<?php
require_once "../Models/Connection.php";
require_once "../Models/cashModels.php";
require_once "TemplateController.php";
session_start();
if (isset($_POST['emricash'])) {
    $emricash = $_POST['emricash'];
    $adresacash = $_POST['adresacash'];
    $telefonicash = $_POST['telefonicash'];
    $qmimicash = $_POST['qmimicash'];
    $shfrytezuesi = $_SESSION['pseudonimi'];
    $mesazhicash = $_POST['mesazhicash'];
    $rezultati = cashModels::jepcash($emricash, $adresacash, $telefonicash, $qmimicash, $shfrytezuesi, $mesazhicash);
    echo json_encode($rezultati);
}
if (isset($_POST['perditesoemriproduktitcash'])) {
    $perditesoemriproduktitcash = $_POST['perditesoemriproduktitcash'];
    $perditesotelefonicash = $_POST['perditesotelefonicash'];
    $perditesoadresacash = $_POST['perditesoadresacash'];
    $perditesoshumacash = $_POST['perditesoshumacash'];
    $perditesomesazhicash = $_POST['perditesomesazhicash'];
    $perditesoidcash = $_POST['perditesoidcash'];
    $rezultatet = cashModels::perditesocashin($perditesoemriproduktitcash, $perditesotelefonicash, $perditesoadresacash, $perditesoshumacash, $perditesomesazhicash, $perditesoidcash);
    echo json_encode($rezultatet);
}
if (isset($_GET['idcash'])) {
    $idcash = $_GET['idcash'];
    $results = cashModels::fshicashid($idcash);
}
$shfaqcash = cashModels::shfaqcash();
$count = 0;
foreach ($shfaqcash as $cash) {
    $statusi = $cash['statusi'];
    $count = $count + 1;
    echo '<tr>
			<td>' . $count . '</td>
			<td>' . $cash['emri'] . '</td>
			<td>' . $cash['adresa'] . '</td>
			<td>' . $cash['telefoni'] . '</td>
			<td>' . $cash['qmimi'] . '</td>
			<td>' . $cash['mesazhi'] . '</td>
			<td>
				<a href="" data-toggle="modal" data-target="#cash-furnizimi" onclick="ndryshocash(' . $cash['idcash'] . ')">
					<i class="far fa-edit ml-2 text-primary"></i>
				</a>
		
					<i class="far fa-times-circle ml-2 " id="fshije" onclick="fshicash(' . $cash['idcash'] . ')"></i>
				<td class="custom-td">';
    if ($statusi == 'nepritje') {
        echo '
<input type="text" id="ndryshostatusincash" value="' . $cash['idcash'] . '" class="d-none">
	<span class="pagesa" id="pagesa" onclick="ndryshostatusinecash(' . $cash['idcash'] . ')">Pagesa</span>';
    } else {
        echo '<img src="Views/assets/images/icon-check2.png" id="img" alt="">';
    }
    echo '</td>	
	</tr>';
    if (isset($_POST['ndryshostatusincash'])) {
        $ndryshostatusincash = $_POST['ndryshostatusincash'];
        $rezultatet = cashModels::ndryshostatusincash($ndryshostatusincash);
    }
}
?>