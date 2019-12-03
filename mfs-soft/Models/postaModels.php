<?php
class postaModels {
    public function shfaqposte() {
        $shfaqrezultatet = Connection::dbconnect()->prepare("SELECT * FROM posta_tbl WHERE statusi = 'nepritje'");
        $shfaqrezultatet->execute();
        return $shfaqrezultatet->fetchAll();
    }
    public function shfaqpostetepaguara() {
        $shfaqrezultatet = Connection::dbconnect()->prepare("SELECT * FROM posta_tbl WHERE statusi = 'i paguar'");
        $shfaqrezultatet->execute();
        return $shfaqrezultatet->fetchAll();
    }
    public function postatotali() {
        $results = Connection::dbconnect()->prepare("SELECT SUM(qmimi) as qmimi FROM posta_tbl WHERE statusi ='nepritje'");
        $results->execute();
        return $results->fetchAll();
    }
    public function dergomeposte($emri, $adresa, $telefoni, $qmimi, $mesazhi, $shfrytezuesi, $nrserikposta) {
        $rezultatet = Connection::dbconnect()->prepare("
		INSERT INTO posta_tbl( emri , telefoni , adresa  , qmimi , mesazhi , shfrytzuesi ,nrserikposta )
		VALUES ('$emri' ,'$telefoni' ,  '$adresa' ,'$qmimi', '$mesazhi' , '$shfrytezuesi', '$nrserikposta' )");
        $rezultatet->execute(array('emri' => $emri, 'telefoni' => $telefoni, 'adresa' => $adresa, 'qmimi' => $qmimi, 'mesazhi' => $mesazhi, 'shfrytezuesi' => $shfrytezuesi, 'nrserikposta' => $nrserikposta,));
        return $rezultatet;
    }
    public function perditesotedhenatpostet($perditesoidposta, $perditesoemri, $perditesoadresa, $perditesotelefoni, $perditesoqmimi, $perditesomesazhi) {
        $results = Connection::dbconnect()->prepare("UPDATE posta_tbl SET emri = '$perditesoemri',adresa = '$perditesoadresa',telefoni = '$perditesotelefoni' ,  qmimi = '$perditesoqmimi' , mesazhi = '$perditesomesazhi' WHERE idposta = '$perditesoidposta'");
        $results->execute();
        return $results;
    }
    public function fshipostenid($deletepostaid) {
        $results = Connection::dbconnect()->prepare("DELETE FROM posta_tbl WHERE idposta = '$deletepostaid'");
        $results->execute(array('idposta' => $deletepostaid));
    }
    public function tegjithadergesatmeposte() {
        $shfaqrezultatet = Connection::dbconnect()->prepare("SELECT COUNT(*) FROM posta_tbl WHERE statusi='nepritje'");
        $shfaqrezultatet->execute();
        return $shfaqrezultatet->fetchAll();
    }
    public function perditesostatusinposte() {
        $results = Connection::dbconnect()->prepare("UPDATE shitjet_tbl SET statusiporosise = 'POSTA' , statusifatures = 'i mbyllur' WHERE statusifatures = 'i hapur'");
        $results->execute();
        return $results;
    }
    public function ndryshomeidposten($idposta2) {
        $results = Connection::dbconnect()->prepare("UPDATE shitjet_tbl SET statusiporosise = 'i rregullt' , statusifatures = 'i mbyllur' WHERE statusiporosise = 'POSTA'");
        $results->execute(array('idposta' => $idposta));
        return $results->fetch();
    }
    public function ndryshostatusinposta($ndryshostatusinposta) {
        $selektokolonen = Connection::dbconnect()->prepare("SELECT * FROM posta_tbl WHERE idposta = '$ndryshostatusinposta'");
        $selektokolonen->execute();
        foreach ($selektokolonen as $idepostes) {
            $selektoshitjen = Connection::dbconnect()->prepare("SELECT * FROM shitjet_tbl WHERE nrserik = '" . $idepostes['nrserikposta'] . "'");
            $selektoshitjen->execute();
        }
        foreach ($selektoshitjen as $shitja) {
            $results = Connection::dbconnect()->prepare("UPDATE shitjet_tbl SET statusiporosise = 'i rregullt'  WHERE nrserik = '" . $shitja['nrserik'] . "' ");
            $results->execute(array('nrserik' => $shitja['nrserik']));
            if ($results) {
                $results = Connection::dbconnect()->prepare("UPDATE posta_tbl SET statusi = 'i paguar'  WHERE nrserikposta = '" . $shitja['nrserik'] . "' ");
                $results->execute(array('nrserikposta' => $shitja['nrserik']));
            }
        }
        return $results;
    }
    public function idpostaedit($idposta4) {
        $results = Connection::dbconnect()->prepare("SELECT * FROM posta_tbl WHERE idposta = '$idposta4'");
        $results->execute();
        return $results->fetch();
    }
}
?>