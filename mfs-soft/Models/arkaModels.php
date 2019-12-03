<?php
class arkaModels {
    public function shfaqarken($data) {
        $shfaqarken = Connection::dbconnect()->prepare("SELECT * FROM arka_tbl WHERE data = '$data'");
        $shfaqarken->execute();
        return $shfaqarken->fetchAll();
    }
    public function startoarken($startimi, $komenti, $data, $puntori) {
        $rezultatet = Connection::dbconnect()->prepare("

			INSERT INTO arka_tbl 
			(  puntoriparadites , startimi ,komentip ,data )
			VALUES 
			('$puntori' ,  '$startimi' ,'$komenti','$data')");
        $rezultatet->execute(array('puntoriparadites' => $puntori, 'startimi' => $startimi, 'komentip' => $komenti, 'data' => $data,));
        return $rezultatet;
    }
    public function arkamasdite($puntori, $komenti, $data) {
        $results = Connection::dbconnect()->prepare("UPDATE arka_tbl SET puntorimasdites ='$puntori' , komentim = '$komenti' WHERE data = '$data'");
        $results->execute();
        return $results;
    }
    public function arka() {
        $results = Connection::dbconnect()->prepare("SELECT startimi FROM arka_tbl");
        $results->execute();
        return $results->fetchAll();
    }
    public function arkatest() {
        $results = Connection::dbconnect()->prepare("SELECT * FROM arka_tbl");
        $results->execute();
        return $results->fetchAll();
    }
    public function qmimiparadites($totaliarkes) {
        $results = Connection::dbconnect()->prepare("UPDATE arka_tbl SET qmimiparadites = '$totaliarkes' ORDER by data DESC LIMIT 1");
        $results->execute();
        return $results;
    }
    public function qmimimasdites($totaliarkes) {
        $results = Connection::dbconnect()->prepare("UPDATE arka_tbl SET qmimimasdites = '$totaliarkes' ORDER by data DESC LIMIT 1");
        $results->execute();
        return $results;
    }
}
?>