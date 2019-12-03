<?php
class borgjiModels {
    public function jepborgj($emriborgjit, $adresaborgjit, $telefoniborgjit, $qmimiborgjit, $mesazhiborgjit, $shfrytezuesi, $nrserikborgj) {
        $rezultatet = Connection::dbconnect()->prepare("
		INSERT INTO borgji_tbl ( emri , telefoni , adresa  , qmimi , mesazhi , shfrytzuesi , nrserikborgj )
		VALUES ('$emriborgjit' ,'$telefoniborgjit' ,  '$adresaborgjit' ,'$qmimiborgjit', '$mesazhiborgjit', '$shfrytezuesi', '$nrserikborgj')");
        $rezultatet->execute(array('emri' => $emriborgjit, 'telefoni' => $telefoniborgjit, 'adresa' => $adresaborgjit, 'qmimi' => $qmimiborgjit, 'mesazhi' => $mesazhiborgjit, 'shfrytzuesi' => $shfrytezuesi, 'nrserikborgj' => $nrserikborgj,));
        return $rezultatet;
    }
    public function borgjtotali() {
        $results = Connection::dbconnect()->prepare("SELECT SUM(qmimi) as qmimi FROM borgji_tbl WHERE statusi ='nepritje'");
        $results->execute();
        return $results->fetchAll();
    }
    public function perditesoborgjin($perditesoemriproduktitborgj, $perditesotelefoniborgj, $perditesoadresaborgj, $perditesoshumaborgj, $perditesomesazhiborgj, $perditesoidborgji) {
        $results = Connection::dbconnect()->prepare("UPDATE borgji_tbl SET emri = '$perditesoemriproduktitborgj',telefoni = '$perditesotelefoniborgj',adresa = '$perditesoadresaborgj' ,  qmimi = '$perditesoshumaborgj' , mesazhi = '$perditesomesazhiborgj' WHERE idborgji = '$perditesoidborgji'");
        $results->execute();
        return $results;
    }
    public function shfaqborgj() {
        $shfaqrezultatet = Connection::dbconnect()->prepare("SELECT * FROM borgji_tbl WHERE statusi = 'nepritje'");
        $shfaqrezultatet->execute();
        return $shfaqrezultatet->fetchAll();
    }
    public function shfaqborgjetepaguara() {
        $shfaqrezultatet = Connection::dbconnect()->prepare("SELECT * FROM borgji_tbl WHERE statusi = 'i paguar'");
        $shfaqrezultatet->execute();
        return $shfaqrezultatet->fetchAll();
    }
    public function ndryshotedhenateborgjit($idborgji) {
        $results = Connection::dbconnect()->prepare("SELECT * FROM borgji_tbl WHERE idborgji = '$idborgji'");
        $results->execute(array('idborgji' => $idborgji));
        return $results->fetch();
    }
    public function fshipborgjinid($deleteborgjinid) {
        $results = Connection::dbconnect()->prepare("DELETE FROM borgji_tbl WHERE idborgji = '$deleteborgjinid'");
        $results->execute(array('idborgji' => $deleteborgjinid));
    }
    public function tegjithaborgjet() {
        $shfaqrezultatet = Connection::dbconnect()->prepare("SELECT COUNT(*) FROM borgji_tbl WHERE statusi = 'nepritje'");
        $shfaqrezultatet->execute();
        return $shfaqrezultatet->fetchAll();
    }
    public function perditesostatusinborgj() {
        $results = Connection::dbconnect()->prepare("UPDATE shitjet_tbl SET statusiporosise = 'BORGJ' , statusifatures = 'i mbyllur' WHERE statusifatures = 'i hapur'");
        $results->execute();
        return $results;
    }
    public function ndryshostatusinborgji($ndryshostatusinborgji) {
        $selektokolonen = Connection::dbconnect()->prepare("SELECT * FROM borgji_tbl WHERE idborgji = '$ndryshostatusinborgji'");
        $selektokolonen->execute();
        foreach ($selektokolonen as $ideborgjit) {
            $selektoshitjen = Connection::dbconnect()->prepare("SELECT * FROM shitjet_tbl WHERE nrserik = '" . $ideborgjit['nrserikborgj'] . "'");
            $selektoshitjen->execute();
        }
        foreach ($selektoshitjen as $shitja) {
            $results1 = Connection::dbconnect()->prepare("UPDATE shitjet_tbl SET statusiporosise = 'i rregullt'  WHERE nrserik = '" . $shitja['nrserik'] . "' ");
            $results1->execute(array('nrserik' => $shitja['nrserik']));
            if ($results1) {
                $results1 = Connection::dbconnect()->prepare("UPDATE borgji_tbl SET statusi = 'i paguar'  WHERE nrserikborgj = '" . $shitja['nrserik'] . "' ");
                $results1->execute(array('nrserikborgj' => $shitja['nrserik']));
            }
        }
        return $results1;
    }
}
