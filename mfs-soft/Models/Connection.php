
<?php

class Connection{

	static public function dbconnect(){
	$pdo = new PDO("mysql:host=localhost;dbname=DB_".$_SESSION['dbja'].";","root","");

		$pdo->exec("set names utf8");

		return $pdo;
	}
}
?>