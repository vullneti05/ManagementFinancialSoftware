<?php 
class cashModels{

	public function jepcash($emricash,$adresacash,$telefonicash,$qmimicash,$shfrytezuesi,$mesazhicash){
		$rezultatet = Connection::dbconnect()->prepare("
		INSERT INTO cash_tbl ( emri , telefoni , adresa  , qmimi , shfrytzuesi , mesazhi )
		VALUES ('$emricash' ,'$telefonicash' ,  '$adresacash' ,'$qmimicash', '$shfrytezuesi', '$mesazhicash' )");

		$rezultatet->execute(array(
			'emri' 			=> $emricash,
			'telefoni' 		=> $telefonicash,
			'adresa' 		=> $adresacash,
			'qmimi' 		=> $qmimicash,
			'shfrytzuesi'	=> $shfrytezuesi,
			'mesazhi' 		=> $mesazhicash,
		));
	
		return $rezultatet;
	}
		public function cashtotali(){
		$results = Connection::dbconnect()->prepare("SELECT SUM(qmimi) as qmimi FROM cash_tbl");

		$results->execute();

		return $results->fetchAll();
	}
	public function perditesocashin($perditesoemriproduktitcash,$perditesotelefonicash,$perditesoadresacash,$perditesoshumacash,$perditesomesazhicash,$perditesoidcash){


			$results = Connection::dbconnect()->prepare("UPDATE cash_tbl SET emri = '$perditesoemriproduktitcash',telefoni = '$perditesotelefonicash',adresa = '$perditesoadresacash' ,  qmimi = '$perditesoshumacash' ,mesazhi = '$perditesomesazhicash' WHERE idcash = '$perditesoidcash'");

		$results->execute();

		return $results;
	}

	public function shfaqcash(){
		$shfaqrezultatet = Connection::dbconnect()->prepare("SELECT * FROM cash_tbl WHERE statusi = 'nepritje'");
		$shfaqrezultatet->execute();
	return $shfaqrezultatet->fetchAll();
}
	public function shfaqcashtepaguara(){
		$shfaqrezultatet = Connection::dbconnect()->prepare("SELECT * FROM cash_tbl WHERE statusi = 'e paguar'");
		$shfaqrezultatet->execute();
	return $shfaqrezultatet->fetchAll();		
	}
	public function fshicashid($idcash){
		$results = Connection::dbconnect()->prepare("DELETE FROM cash_tbl WHERE idcash = '$idcash'");
		$results->execute(array('idcash'=>$idcash));
	}
	public function ndryshotedhenatecashit($idcashndrysho){
		$results = Connection::dbconnect()->prepare("SELECT * FROM cash_tbl WHERE idcash = '$idcashndrysho'");
		$results->execute(array('idcash'=>$idcashndrysho));
		return $results->fetch();
	}
	public function tegjithacash(){
		$shfaqrezultatet = Connection::dbconnect()->prepare("SELECT COUNT(*) FROM cash_tbl WHERE statusi = 'nepritje'");
		$shfaqrezultatet->execute();
		return $shfaqrezultatet->fetchAll();
	}
	public function ndryshostatusincash($ndryshostatusincash){

	$selektokolonen = Connection::dbconnect()->prepare("UPDATE cash_tbl  SET statusi = 'e paguar' WHERE idcash = '$ndryshostatusincash'");
	$selektokolonen->execute();

	return $selektokolonen;	

}

}
?>