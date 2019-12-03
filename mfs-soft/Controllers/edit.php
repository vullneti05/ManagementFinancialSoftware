<?php 
//Thirrja e Konektimit me databaze , pyetesoreve te Regjistrimit te mallit the TemplateControlleri-t (root-ave)
session_start();
require_once "../Models/Connection.php";
require_once "../Models/ADMConnection.php";
require_once "../Models/regjistrimimallitModels.php";
require_once "../Models/furnizimiModels.php";
require_once "../Models/postaModels.php";
require_once "../Models/borgjiModels.php";
require_once "../Models/cashModels.php";
require_once "../Models/shfrytzuesitModels.php";
require_once "../Models/administrataModels.php";
require_once "TemplateController.php";

if(isset($_POST['idposta4'])){
    $idposta4 = $_POST['idposta4'];
    $results = postaModels::idpostaedit($idposta4);
    echo json_encode($results);
}
if(isset($_POST['ndryshomallin'])){
    $ndryshomallin = $_POST['ndryshomallin'];
    $resultatet = regjistrimimallitModels::ndryshoregjistriminemallit($ndryshomallin);
    echo json_encode($resultatet);
}
if(isset($_POST['ndryshofurniziminaktiv'])){
    $ndryshofurniziminaktiv = $_POST['ndryshofurniziminaktiv'];
    $resultatet = furnizimiModels::ndryshofurniziminaktiv($ndryshofurniziminaktiv);
    echo json_encode($resultatet);
}
if(isset($_POST['barkodid'])){
    $barkodid = $_POST['barkodid'];
    $resultatet = regjistrimimallitModels::ndryshoregjistriminemallit($barkodid);
    echo json_encode($resultatet);
}
if(isset($_POST['idborgji'])){
    $idborgji = $_POST['idborgji'];
    $resultatet = borgjiModels::ndryshotedhenateborgjit($idborgji);
    echo json_encode($resultatet);
}
if(isset($_POST['idcashndrysho'])){
    $idcashndrysho = $_POST['idcashndrysho'];
    $resultatet = cashModels::ndryshotedhenatecashit($idcashndrysho);
    echo json_encode($resultatet);
}
if(isset($_POST['editid'])){
    $editid = $_POST['editid'];
    $resultatet = shfrytzuesitModels::ndryshotedhenateshfrytzuesit($editid);
    echo json_encode($resultatet);
}
//ADMINISTRATA
if(isset($_POST['biznesiID'])){
    $biznesiID = $_POST['biznesiID'];
    $results = administrataModels::ndryshobiznesin($biznesiID);
    echo json_encode($results);
}
if(isset($_POST['editdb'])){
    $editdb = $_POST['editdb'];
    $results = administrataModels::ndryshoemridb($editdb);
    echo json_encode($results); 
}
?>