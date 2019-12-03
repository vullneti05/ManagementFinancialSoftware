<?php
//KONEKTIMI ME DATABAZE NGA ADMINISTRATORI
class ADMConnection {
    static public function admconnect() {
        $pdo = new PDO("mysql:host=localhost;dbname=db_qendrore;", "root", "");
        $pdo->exec("set names utf8");
        return $pdo;
    }
}
?>