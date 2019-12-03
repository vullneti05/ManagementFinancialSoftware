<?php
session_start();
if (isset($_GET['route'])) {
    if ($_GET['route'] == "CMS" || $_GET['route'] == "dashboard" || $_GET['route'] == "barkod-artikull" || $_GET['route'] == "regjistrimi-mallit" || $_GET['route'] == "fletore" || $_GET['route'] == "veshtrimi-faturave" || $_GET['route'] == "furnizimi" || $_GET['route'] == "stoku" || $_GET['route'] == "statistikat" || $_GET['route'] == "arka" || $_GET['route'] == "logout" || $_GET['route'] == "shfrytezuesit") {
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == "kaqasje") {
            include ("includes/header.php");
            include ("modules/CMS/" . $_GET['route'] . ".php");
            include ("includes/footer.php");
        }
    }
    if (isset($_GET['route'])) {
        if ($_GET['route'] == "invoke") {
            include ("modules/cms/invoke.php");
        }
    }
    if (isset($_GET['route'])) {
        if ($_GET['route'] == "emridb") {
            include ("modules/cms/emridb.php");
        }
    }
    if (isset($_GET['route'])) {
        if ($_GET['route'] == "administrata" || $_GET['route'] == "bizneset" || $_GET['route'] == "regjistrimi-biznesit" || $_GET['route'] == "statistikat-admin" || $_GET['route'] == "kyqu" || $_GET['route'] == "logoutadm" || $_GET['route'] == "te-dhenat-biznesit") {
            if (isset($_SESSION['administratori']) && $_SESSION['administratori'] == "adminmeqasje") {
                include ("modules/administrata/header.php");
                include ("modules/administrata/" . $_GET['route'] . ".php");
                include ("modules/administrata/footer.php");
            } else {
                include ("modules/administrata/kyqu.php");
            }
        }
    }
    if ($_GET['route'] == "startimi-arkes") {
        include ("Views/modules/startimi-arkes/header.php");
        include ("modules/startimi-arkes/" . $_GET['route'] . ".php");
        include ("Views/modules/startimi-arkes/footer.php");
    }
} else {
    include ("includes/frontheader.php");
    include ("includes/frontfooter.php");
}
