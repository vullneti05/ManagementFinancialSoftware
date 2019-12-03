<?php
require_once "../Models/Connection.php";
require_once "../Models/arkaModels.php";
require_once "TemplateController.php";
session_start();
if (isset($_POST['data'])) {
    $data = $_POST['data'];
    $startimi = $_POST['shuma'];
    $komenti = $_POST['komenti'];
    $puntori = $_POST['puntori'];
    $shfaqarken = arkaModels::shfaqarken($data);
    foreach ($shfaqarken as $arka) {
        $puntoriparadites = $arka['puntoriparadites'];
        $startimi = $arka['startimi'];
        $data = $arka['data'];
        $_SESSION['qmimiparadites'] = $arka['qmimiparadites'];
        $_SESSION['qmimimasdites'] = $arka['qmimimasdites'];
    }
    if (!empty($puntoriparadites) && $puntoriparadites == $puntori) {
        header("location: dashboard");
    } else if (!empty($puntoriparadites) && $puntoriparadites != $puntori) {
        $rezultati = arkaModels::arkamasdite($puntori, $komenti, $data);
        header("Location: dashboard");
    } else if (empty($puntoriparadites)) {
        $rezultati = arkaModels::startoarken($startimi, $komenti, $data, $puntori);
        foreach ($rezultati as $result) {
            $_SESSION['puntoriparadites'] = $result['puntoriparadites'];
        }
    }
    echo json_encode($rezultati);
}
if (isset($_POST['totaliarkes'])) {

    $totaliarkes = $_POST['totaliarkes'];
    $paramas = arkaModels::arkatest();

    foreach ($paramas as $test) {
        $para = $test['qmimiparadites'];
        // $mas = $test['qmimimasdites'];
        
    }
    if (empty($para)) {
        $results = arkaModels::qmimiparadites($totaliarkes);
    $_SESSION['loggedIn'] = "nukaqasje";

    } else {
        $results = arkaModels::qmimimasdites($totaliarkes);
    $_SESSION['loggedIn'] = "nukaqasje";
    }
    echo json_encode($results);
}
?>
