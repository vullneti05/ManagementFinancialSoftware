<?php
//Te Gjitha Queryt (Pyetesoret) e kategorise :  Regjistrimi i  Mallit
class regjistrimimallitModels {
    public function shitjet() {
        $results = Connection::dbconnect()->prepare("SELECT * FROM shitjet_tbl WHERE statusifatures = 'i mbyllur'");
        $results->execute();
        return $results->fetchAll();
    }
    public function shitjettotali() {
        $results = Connection::dbconnect()->prepare("SELECT SUM(vlera) as vlera , date(koha) as koha FROM shitjet_tbl WHERE statusifatures = 'i mbyllur' AND statusiporosise='i rregullt' AND koha = CURDATE()");
        $results->execute();
        return $results->fetchAll();
    }
    public function shitjetehapura() {
        $results = Connection::dbconnect()->prepare("SELECT * FROM shitjet_tbl WHERE statusifatures = 'i hapur'");
        $results->execute();
        return $results->fetchAll();
    }
    public function regjistromallin($barkodi, $artikulli, $qmimishitjes, $njesia, $tvsh, $sasiaminimale, $pershkrimi) {
        $rezultatet = Connection::dbconnect()->prepare("INSERT INTO regjistrimimallit_tbl( emriproduktit, qmimishitjes ,  njesia , tvsh , sasiaminimale , pershkrimi , barkodi )VALUES ('$artikulli' ,'$qmimishitjes' ,  '$njesia' ,'$tvsh', '$sasiaminimale', '$pershkrimi' ,'$barkodi' )");
        $rezultatet->execute(array('emriproduktit' => $artikulli, 'qmimishitjes' => $qmimishitjes, 'njesia' => $njesia, 'tvsh' => $tvsh, 'sasiaminimale' => $sasiaminimale, 'pershkrimi' => $pershkrimi, 'barkodi' => $barkodi));
        return $rezultatet;
    }
    public function perditesomallin($id, $perditesoartikulli, $perditesobarkod, $perditesoqmimishitjes, $perditesosasiaminimale, $perditesonjesia) {
        $results = Connection::dbconnect()->prepare("UPDATE regjistrimimallit_tbl SET emriproduktit = '$perditesoartikulli',barkodi = '$perditesobarkod',qmimishitjes = '$perditesoqmimishitjes' ,  sasiaminimale = '$perditesosasiaminimale' , njesia = '$perditesonjesia' WHERE id = '$id'");
        $results->execute();
        return $results;
    }
    public function fshimallin($regjistrimimallitID) {
        $results = Connection::dbconnect()->prepare("DELETE FROM regjistrimimallit_tbl WHERE id = '$regjistrimimallitID'");
        $results->execute(array('id' => $regjistrimimallitID));
    }
    public function ndryshoregjistriminemallit($ndryshomallin) {
        $results = Connection::dbconnect()->prepare("SELECT * FROM regjistrimimallit_tbl WHERE id = '$ndryshomallin'");
        $results->execute(array('id' => $ndryshomallin));
        return $results->fetch();
    }
    public function shfaqmallin() {
        $shfaqrezultatet = Connection::dbconnect()->prepare("SELECT * FROM regjistrimimallit_tbl");
        $shfaqrezultatet->execute();
        return $shfaqrezultatet->fetchAll();
    }
    // public function ndryshotedhenatepostes($idposta){
    // 	$results = Connection::dbconnect()->prepare("SELECT * FROM posta_tbl WHERE idposta = '$idposta'");
    // 	$results->execute(array('idposta'=>$idposta));
    // 	return $results->fetch();
    // }
    
}
?>