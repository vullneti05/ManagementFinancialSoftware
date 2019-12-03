<?php
require_once "../Models/ADMConnection.php";
require_once "../Models/administrataModels.php";
require_once "TemplateController.php";
session_start();
if (isset($_POST['emridatabazes'])) {
    $emridatabazes = $_POST['emridatabazes'];
    $tipidatabazes = $_POST['tipidatabazes'];
    $results = administrataModels::aktivizoklientin($emridatabazes, $tipidatabazes);
    echo json_encode($results);
}
if (isset($_POST['pronari'])) {
    $kompania = $_POST['kompania'];
    $qyteti = $_POST['qyteti'];
    $adresa = $_POST['adresa'];
    $nrbiznesit = $_POST['nrbiznesit'];
    $nrfiskal = $_POST['nrfiskal'];
    $linku = $_POST['linku'];
    $pronari = $_POST['pronari'];
    $nrtelefoni = $_POST['nrtelefoni'];
    $dataskadences = $_POST['dataskadences'];
    $statusi = $_POST['statusi'];
    $nrartikujve = $_POST['nrartikujve'];
    $databaza = $_POST['databaza'];
    $password = $_POST['password'];
    $qmimi = $_POST['qmimi'];
    $results = administrataModels::regjistrobiznes($kompania, $qyteti, $adresa, $nrbiznesit, $nrfiskal, $linku, $pronari, $nrtelefoni, $dataskadences, $nrartikujve, $databaza, $password,$qmimi, $statusi);
    echo json_encode($results);
}
if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];
    $results = administrataModels::deletebiznes($deleteid);
}
if (isset($_POST['editid']) && isset($_POST['editkompania'])) {
    $editid = $_POST['editid'];
    $editkompania = $_POST['editkompania'];
    $editpronari = $_POST['editpronari'];
    $editnrtelefoni = $_POST['editnrtelefoni'];
    $editlinku = $_POST['editlinku'];
    $editdataskadences = $_POST['editdataskadences'];
    $editnrartikujve = $_POST['editnrartikujve'];
    $editstatusi = $_POST['editstatusi'];
    if($editdataskadences =="pasiv"){
        session_unset($_SESSION['dbja']);
        session_unset('skadenca');
    }else if($editdataskadences =="aktiv"){
        session_set($_SESSION['dbja']);
        session_set('skadenca');      
    }
    $rezultatet = administrataModels::perditesobiznesin($editid, $editkompania, $editpronari, $editnrtelefoni, $editlinku, $editdataskadences, $editnrartikujve, $editstatusi);
    echo json_encode($rezultatet);
}
$results = administrataModels::veshtrobizneset();
foreach ($results as $bizneset) {
    echo '
            <tr>
                <td >1</td>
                <td >' . $bizneset['kompania'] . '</td>
                <td >' . $bizneset['pronari'] . '</td>
                <td >' . $bizneset['nrtelefoni'] . '</td>
                <td >' . $bizneset['linku'] . '</td>
                ';
                if($bizneset['statusi'] =='aktiv'){
                    echo "<td class='badge badge-success ml-4 mt-2'>".$bizneset['statusi']."</td>";
                }else{
                    echo "<td class='badge badge-danger ml-4 mt-2'>".$bizneset['statusi']."</td>"; 
                }
    echo            
               '<td >' . $bizneset['dataskadences'] . '</td>
                <td >' . $bizneset['nrartikujve'] . '</td>
                <td >' . $bizneset['databaza'] . '</td>
                <td >test</td>
                <td width="105px">
                <form method="GET">
                <a href="te-dhenat-biznesit?biznesi=' . $bizneset['biznesi_id'] . '" class="ml-2">
                <img src="Views/assets/images/Icon feather-credit-card.png" width="25%" alt="">
                </a>
                </form>
                <a href=""data-toggle="modal" data-target="#custom-modal-b" onclick="ndryshobiznesin(' . $bizneset['biznesi_id'] . ')">
                <i class="far fa-edit ml-1 text-primary"></i>
                </a>
                <i class="far fa-times-circle custom-delete ml-0" onclick="fshibiznesin(' . $bizneset['biznesi_id'] . ')"></i>
        
                </td>
            </tr>
        ';
}
if (isset($_POST['dataskadences']) && isset($_POST['pagesa'])) {
    $dataeskadences = $_POST['dataskadences'];
    $pages = $_POST['pagesa'];
    $afatizobiznes = $_POST['afatizobiznes'];
    $results = administrataModels::afatizobiznesin($dataeskadences, $pages, $afatizobiznes);
    echo json_encode($results);
}
if (isset($_GET['fshibizin'])) {
    $fshijebizin = $_GET['fshibizin'];
    $results = administrataModels::fshibiznesin($fshijebizin);
}
if (isset($_POST['dbname'])) {
    $dbname = $_POST['dbname'];
    $idedbs = $_POST['idedbs'];
    $rezultatet = administrataModels::perditesodbname($dbname, $idedbs);
    echo json_encode($rezultatet);
}
?>