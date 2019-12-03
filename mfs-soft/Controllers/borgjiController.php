<?php
require_once "../Models/Connection.php";
require_once "../Models/borgjiModels.php";
require_once "TemplateController.php";
session_start();
if (isset($_POST['emriborgjit'])) {
    $emriborgjit = $_POST['emriborgjit'];
    $adresaborgjit = $_POST['adresaborgjit'];
    $telefoniborgjit = $_POST['telefoniborgjit'];
    $qmimiborgjit = $_POST['qmimiborgjit'];
    $mesazhiborgjit = $_POST['mesazhiborgjit'];
    $shfrytezuesi = $_SESSION['pseudonimi'];
    $nrserikborgj = $_POST['nrserikborgj'];
    $rezultati = borgjiModels::jepborgj($emriborgjit, $adresaborgjit, $telefoniborgjit, $qmimiborgjit, $mesazhiborgjit, $shfrytezuesi, $nrserikborgj);
    echo json_encode($rezultati);
}
if (isset($_POST['perditesoidborgji'])) {
    $perditesoidborgji = $_POST['perditesoidborgji'];
    $perditesoemriproduktitborgj = $_POST['perditesoemriproduktitborgj'];
    $perditesoadresaborgj = $_POST['perditesoadresaborgj'];
    $perditesotelefoniborgj = $_POST['perditesotelefoniborgj'];
    $perditesoshumaborgj = $_POST['perditesoshumaborgj'];
    $perditesomesazhiborgj = $_POST['perditesomesazhiborgj'];
    $rezultatet = borgjiModels::perditesoborgjin($perditesoemriproduktitborgj, $perditesotelefoniborgj, $perditesoadresaborgj, $perditesoshumaborgj, $perditesomesazhiborgj, $perditesoidborgji);
    echo json_encode($rezultatet);
}
$shfaqborgjet = borgjiModels::shfaqborgj();
$count = 0;
foreach ($shfaqborgjet as $borgji) {
    $statusi = $borgji['statusi'];
    $count = $count + 1;
    echo '

	<tr>
		<td>1</td>
		<td>' . $borgji['emri'] . '</td>
		<td>' . $borgji['adresa'] . '</td>	
		<td>' . $borgji['telefoni'] . '</td>
		<td>' . $borgji['qmimi'] . '</td>
		<td>' . $borgji['mesazhi'] . '</td>
		<td>
		

		<a href="" data-toggle="modal" data-target="#borgj-furnizimi">
			<i class="far fa-edit ml-2 text-primary"  onclick="ndryshotedhenatngaborgji(' . $borgji['idborgji'] . ')"></i>
		</a>
			
		
		
		</td>
				<td class="custom-td">

';
    if ($statusi == 'nepritje') {
        echo '
<input type="text" id="ndryshostatusinborgji" value="' . $borgji['idborgji'] . '" class="d-none">
	<span class="pagesa" id="pagesa" onclick="ndryshostatusineborgji(' . $borgji['idborgji'] . ')">Pagesa</span>';
    } else {
        echo '<img src="Views/assets/images/icon-check2.png" id="img" alt="">';
    }
    echo '</td>	
	</tr>';
}
if (isset($_GET['deleteborgjinid'])) {
    $deleteborgjinid = $_GET['deleteborgjinid'];
    $results = borgjiModels::fshipborgjinid($deleteborgjinid);
}
// <i class="far fa-times-circle ml-2" onclick="deleteborgjin('.$borgji['idborgji'].')"></i>
if (isset($_POST['borgj'])) {
    $perditesostatusinborgj = borgjiModels::perditesostatusinborgj();
    echo json_encode($perditesostatusinborgj);
}
if (isset($_POST['ndryshostatusinborgji'])) {
    $ndryshostatusinborgji = $_POST['ndryshostatusinborgji'];
    $rezultatet = borgjiModels::ndryshostatusinborgji($ndryshostatusinborgji);
}
?>