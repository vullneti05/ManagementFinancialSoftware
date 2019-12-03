<?php
require_once ("../Models/shfrytzuesitModels.php");
require_once ("../Models/arkaModels.php");
require_once ("../Models/Connection.php");
session_start();
if (isset($_POST['loginpseudonimi'])) {
    $loginpseudonimi = $_POST['loginpseudonimi'];
    $loginfjalkalimi = $_POST['loginfjalkalimi'];
    if (preg_match('/^[a-zA-Z0-9]+$/', $loginpseudonimi) && preg_match('/^[a-zA-Z0-9]+$/', $loginfjalkalimi)) {
        $results = shfrytzuesitModels::Krahaso($loginpseudonimi, $loginfjalkalimi);
        if ($results["pseudonimi"] == $loginpseudonimi && $results["fjalkalimi"] == $loginfjalkalimi) {
            $_SESSION['loggedIn'] = "kaqasje";
            $_SESSION['pseudonimi'] = $results["pseudonimi"];
            $_SESSION['kasieri'] = $results["emri"];
            $_SESSION['image'] = $results["image"];
            $_SESSION['autorizimi'] = $results["autorizimi"];
            foreach ($results as $result) {
                $_SESSION['autorizimi'] = $results["autorizimi"];
            }
            echo 1;
        }
    } else {
        echo 0;
    }
}
?>