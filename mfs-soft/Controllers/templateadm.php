<?php
session_start();
if (isset($_GET['route'])) {
    if ($_GET['route'] == "administrata" || $_GET['route'] == "bizneset" || $_GET['route'] == "regjistrimi-biznesit" || $_GET['route'] == "statistikat-admin" || $_GET['route'] == "kyqu" || $_GET['route'] == "logoutadm" || $_GET['route'] == "te-dhenat-biznesit") {
        if (isset($_SESSION['administratori']) && $_SESSION['administratori'] == "administratori") {
            include ("modules/header.php");
            include ("modules/administratori/" . $_GET['route'] . ".php");
            include ("modules/footer.php");
        }
    } else {
        include ("modules/administratori/kyqu.php");
    }
}
?>