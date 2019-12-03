<?php

Class statistikatModels{
	public function vlerablerse(){
		$results = Connection::dbconnect()->prepare("SELECT SUM(qmimiblerjes) as qmimiblerjes , SUM(qmimishitjes) as qmimishitjes , SUM(sasia) as sasia FROM furnizimi_tbl");
		$results->execute();
		return $results->fetchAll();
	}


	public function krahasomemuaj($filtro){
		$results = Connection::dbconnect()->prepare("SELECT SUM(qmimi) as qmimi , sum(sasia) as sasia FROM shitjet_tbl WHERE koha LIKE '$filtro%'");
		$results->execute();

		return	$results->fetchAll();

	}	

	public function krahasomemuajfurnizimin($filtro){
		$results1 = Connection::dbconnect()->prepare("SELECT SUM(qmimiblerjes) as qmimiblerjes , SUM(sasia) as sasia FROM furnizimi_tbl WHERE koha LIKE '$filtro%'");
		$results1->execute();
		$count = $results1->rowCount();
		
					return	$results1->fetchAll();

	}


	public function krahasomemuaj1($filtro2){
		$results = Connection::dbconnect()->prepare("SELECT SUM(qmimi) as qmimi , sum(sasia) as sasia FROM shitjet_tbl WHERE koha LIKE '$filtro2%'");
		
		$results->execute();

		return	$results->fetchAll();	
	}
		public function krahasomemuajfurnizimin1($filtro2){
		$results1 = Connection::dbconnect()->prepare("SELECT SUM(qmimiblerjes) as qmimiblerjes , SUM(sasia) as sasia FROM furnizimi_tbl WHERE koha LIKE '$filtro2%'");
		$results1->execute();
		$count = $results1->rowCount();
		
					return	$results1->fetchAll();

	}


	public function vleraefurnizimit(){

	$shfaqrezultatet = Connection::dbconnect()->prepare("SELECT shifrafatures from furnizimi_tbl group by shifrafatures");
	$shfaqrezultatet->execute();
	$count = $shfaqrezultatet->rowCount();
	return $count;

	}



}