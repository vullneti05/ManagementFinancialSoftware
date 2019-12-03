<?php
require_once "../Models/Connection.php";
require_once "../Models/postaModels.php";
require_once "TemplateController.php";
session_start();
$shfaqposte = postaModels::shfaqposte();
$count = 0;
foreach ($shfaqposte as $posti) {
    $statusi = $posti['statusi'];
    echo '<tr>
		<td>1</td>
		<td>' . $posti['emri'] . '</td>
		<td>' . $posti['adresa'] . '</td>	
		<td>' . $posti['telefoni'] . '</td>
		<td>' . $posti['qmimi'] . '</td>
		<td>' . $posti['mesazhi'] . '</td>
		<td>
			<a href="" data-toggle="modal" data-target="#post-furnizimi" >
				<i class="far fa-edit ml-2 text-primary"  onclick="ndryshotdhanen(' . $posti['idposta'] . ')"></i>
			</a>
			<i class="far fa-times-circle ml-2" onclick="deleteblerjenmeposte(' . $posti['idposta'] . ')"></i>
		</td>
		<td class="custom-td">

';
    if ($statusi == 'nepritje') {
        echo '
<input type="text" id="ndryshostatusinposta" value="' . $posti['idposta'] . '" class="d-none">
	<span class="pagesa" id="pagesa" onclick="ndryshostatusinepostes(' . $posti['idposta'] . ')">Pagesa</span>';
    } else {
        echo '<img src="Views/assets/images/icon-check2.png" id="img" alt="">';
    }
    echo '</td>	
	</tr>';
}
if (isset($_POST['emri'])) {
    $emri = $_POST['emri'];
    $telefoni = $_POST['telefoni'];
    $adresa = $_POST['adresa'];
    $qmimi = $_POST['qmimi'];
    $mesazhi = $_POST['mesazhi'];
    $shfrytezuesi = $_SESSION['pseudonimi'];
    $nrserikposta = $_POST['nrserikposta'];
    $rezultati = postaModels::dergomeposte($emri, $telefoni, $adresa, $qmimi, $mesazhi, $shfrytezuesi, $nrserikposta);
    echo json_encode($rezultati);
}
if (isset($_POST['perditesoidposta'])) {
    $perditesoidposta = $_POST['perditesoidposta'];
    $perditesoemri = $_POST['perditesoemri'];
    $perditesoadresa = $_POST['perditesoadresa'];
    $perditesotelefoni = $_POST['perditesotelefoni'];
    $perditesoqmimi = $_POST['perditesoqmimi'];
    $perditesomesazhi = $_POST['perditesomesazhi'];
    $rezultatet = postaModels::perditesotedhenatpostet($perditesoidposta, $perditesoemri, $perditesoadresa, $perditesotelefoni, $perditesoqmimi, $perditesomesazhi);
    echo json_encode($rezultatet);
}
if (isset($_POST['ndryshostatusinposta'])) {
    $ndryshostatusinposta = $_POST['ndryshostatusinposta'];
    $rezultatet = postaModels::ndryshostatusinposta($ndryshostatusinposta);
}
if (isset($_GET['deletepostaid'])) {
    $deletepostaid = $_GET['deletepostaid'];
    $results = postaModels::fshipostenid($deletepostaid);
}
if (isset($_POST['poste'])) {
    $perditesostatusinposte = postaModels::perditesostatusinposte();
    echo json_encode($perditesostatusinposte);
}
if (isset($_POST['idposta2'])) {
    $idposta2 = $_POST['idposta2'];
    $ndryshoidposta2 = postaModels::ndryshomeidposten($idposta2);
}
?>