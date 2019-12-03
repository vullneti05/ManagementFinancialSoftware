<?php
class furnizimiModels {
    public function shfaqfaturataktive() {
        $faturataktive = Connection::dbconnect()->prepare("SELECT * FROM furnizimi_tbl WHERE statusi = 'aktiv'");
        $faturataktive->execute();
        return $faturataktive->fetchAll();
    }
    public function sasiaminimale() {
        $sasiaminimale = Connection::dbconnect()->prepare("SELECT t1.id_furnizimi, t1.emriproduktit_fk, t1.qmimiblerjes, t1.qmimishitjes ,t1.sasia , t1.shifrafatures , t1.emrifurnitorit , t2.emriproduktit,t2.sasiaminimale , t2.barkodi
		FROM furnizimi_tbl t1 INNER JOIN regjistrimimallit_tbl t2 on  t1.emriproduktit_fk = t2.emriproduktit ");
        $sasiaminimale->execute();
        return $sasiaminimale->fetchAll();
    }
    public function ideproduktit($ideproduktit) {
        $rezultatet = Connection::dbconnect()->prepare("INSERT INTO furnizimi_tbl(
			 emriproduktit_fk, qmimiblerjes ,  qmimishitjes , sasia , shifrafatures , emrifurnitorit , koha, emrishfrytezuesit )
			VALUES ('$emrimallit' ,'$qmimiblerjes' ,  '$qmimishitjes' ,'$sasia', '$shifrafatures', '$emrifurnitorit',date('$koha'),'$shfrytezuesi')");
        $rezultatet->execute(array('emriproduktit_fk' => $emrimallit, 'qmimiblerjes' => $qmimiblerjes, 'qmimishitjes' => $qmimishitjes, 'sasia' => $sasia, 'shifrafatures' => $shifrafatures, 'emrifurnitorit' => $emrifurnitorit, 'koha' => $koha, 'emrishfrytezuesit' => $shfrytezuesi));
        return $rezultatet;
    }
    public function regjistrofurnizimin1($emertimimallit1, $qmimiblerjes1, $qmimishitjes1, $sasia1, $shifrafatures1, $emrifurnitorit1, $koha1, $shfrytezuesi1) {
        $rezultatet = Connection::dbconnect()->prepare("INSERT INTO furnizimi_tbl(
			 emriproduktit_fk, qmimiblerjes ,  qmimishitjes , sasia , shifrafatures , emrifurnitorit , koha, emrishfrytezuesit )
			VALUES ('$emertimimallit1' ,'$qmimiblerjes1' ,  '$qmimishitjes1' ,'$sasia1', '$shifrafatures1', '$emrifurnitorit1',date('$koha1'),'$shfrytezuesi1')");
        $rezultatet->execute(array('emriproduktit_fk' => $emertimimallit1, 'qmimiblerjes' => $qmimiblerjes1, 'qmimishitjes' => $qmimishitjes1, 'sasia' => $sasia1, 'shifrafatures' => $shifrafatures1, 'emrifurnitorit' => $emrifurnitorit1, 'koha' => $koha1, 'emrishfrytezuesit' => $shfrytezuesi1));
        return $rezultatet;
    }
    public function regjistrofurnizimin($emertimimallit, $qmimiblerjes, $qmimishitjes, $sasia, $shifrafatures, $emrifurnitorit, $koha, $shfrytezuesi) {
        $rezultatet = Connection::dbconnect()->prepare("INSERT INTO furnizimi_tbl(
			 emriproduktit_fk, qmimiblerjes ,  qmimishitjes , sasia , shifrafatures , emrifurnitorit , koha, emrishfrytezuesit )
			VALUES ('$emertimimallit' ,'$qmimiblerjes' ,  '$qmimishitjes' ,'$sasia', '$shifrafatures', '$emrifurnitorit',date('$koha'),'$shfrytezuesi')");
        $rezultatet->execute(array('emriproduktit_fk' => $emertimimallit, 'qmimiblerjes' => $qmimiblerjes, 'qmimishitjes' => $qmimishitjes, 'sasia' => $sasia, 'shifrafatures' => $shifrafatures, 'emrifurnitorit' => $emrifurnitorit, 'koha' => $koha, 'emrishfrytezuesit' => $shfrytezuesi));
        return $rezultatet;
    }
    public function mbyllfaturen($pasiv) {
        $mbyllja = Connection::dbconnect()->prepare("UPDATE furnizimi_tbl SET statusi = '$pasiv' WHERE statusi = 'aktiv'");
        $mbyllja->bindParam('statusi', $pasiv);
        $mbyllja->execute();
    }
    public function shfaqdepo() {
        $a = Connection::dbconnect()->prepare("SELECT * FROM  regjistrimimallit_tbl");
        foreach ($a as $malli) {
            $x = Connection::dbconnect()->prepare("SELECT sum(sasia) AS sasiaefurnizimit FROM furnizimi_tbl WHERE emriproduktit_fk = '" . $malli['emriproduktit'] . "'");
            $x->execute();
            foreach ($x as $j) {
                $x1 = $j['sasiaefurnizimit'];
            }
            $sasiafurnizimit = $x->rowCount();
            $y = Connection::dbconnect()->prepare("SELECT sum(sasia) AS sasiaeshitjes FROM shitjet_tbl WHERE emri = '" . $malli['emriproduktit'] . "'");
            foreach ($y as $j) {
                $y1 = $j['sasiaeshitjes'];
            }
            $_SESSION['z'] = $x1 - $y1;
            echo $malli['emriproduktit'] . 'ne depo jane ' . $_SESSION['z'];
        }
    }
    public function shfaqfaturatembyllura() {
        $faturatapasive = Connection::dbconnect()->prepare("SELECT id_furnizimi , emriproduktit_fk,SUM(qmimiblerjes) as qmimiblerjes , SUM(qmimishitjes) as qmimishitjes , shifrafatures , SUM(sasia) as sasia , emrifurnitorit , koha , emrishfrytezuesit FROM furnizimi_tbl GROUP BY shifrafatures");
        $faturatapasive->execute();
        return $faturatapasive->fetchAll();
    }
    public function shfaqfaturatembyllurameid($veshtrimi) {
        $faturatapasive = Connection::dbconnect()->prepare("SELECT shifrafatures , emrifurnitorit , koha   FROM furnizimi_tbl WHERE shifrafatures = '$veshtrimi' GROUP BY shifrafatures");
        $faturatapasive->execute();
        return $faturatapasive->fetchAll();
    }
    public function ndryshofurniziminaktiv($ndryshofurniziminaktiv) {
        $results = Connection::dbconnect()->prepare("SELECT * FROM furnizimi_tbl WHERE id_furnizimi = '$ndryshofurniziminaktiv'");
        $results->execute(array('id_furnizimi' => $ndryshofurniziminaktiv));
        return $results->fetch();
    }
    public function veshtro($veshtrimi) {
        $results = Connection::dbconnect()->prepare("SELECT * FROM furnizimi_tbl WHERE shifrafatures = '$veshtrimi'");
        $results->execute(array('shifrafatures' => $veshtrimi));
        return $results->fetchAll();
    }
    public function perditesofurniziminaktiv($editfurnizimiaktiv, $editemriproduktitaktiv, $editqmimiblerjesaktiv, $editqmimishitjesaktiv, $editsasiaaktiv) {
        $results = Connection::dbconnect()->prepare("UPDATE furnizimi_tbl SET emriproduktit_fk = '$editemriproduktitaktiv',qmimiblerjes = '$editqmimiblerjesaktiv',qmimishitjes = '$editqmimishitjesaktiv' ,  sasia = '$editsasiaaktiv' WHERE id_furnizimi = '$editfurnizimiaktiv'");
        $results->execute();
        return $results;
    }
    public function fshifurniziminaktiv($deletefurniziminaktiv) {
        $results = Connection::dbconnect()->prepare("DELETE FROM furnizimi_tbl WHERE id_furnizimi = '$deletefurniziminaktiv'");
        $results->execute(array('id_furnizimi' => $deletefurniziminaktiv));
    }
    public function deletefurniziminpasiv($deletefurniziminpasiv) {
        $results = Connection::dbconnect()->prepare("DELETE FROM furnizimi_tbl WHERE id_furnizimi = '$deletefurniziminpasiv'");
        $results->execute(array('id_furnizimi' => $deletefurniziminpasiv));
    }
    public function kerkonedatabase($kerko) {
        $results = Connection::dbconnect()->prepare("SELECT id , emriproduktit , qmimishitjes , pershkrimi , barkodi   FROM regjistrimimallit_tbl WHERE emriproduktit  LIKE '%$kerko%' OR barkodi LIKE '%" . $kerko . "%'");
        $results->execute();
        $tedhena = $results->rowCount();
        if ($tedhena < 1) {
            echo " <span style='color:purple;margin-left:150px;'> Artikulli i kerkuar nuk gjindet ne stok  ! </span>";
        } else {
            return $results;
        }
    }
    public function shtoproduktin($kerkoemriproduktit, $kerkoqmimishitjes, $sasiabuton, $vlera, $kerkobarkodi, $shfrytezuesi, $nrserik,$kohasot) {
   
        $rezultatet = Connection::dbconnect()->prepare("
		INSERT INTO shitjet_tbl( emri , qmimi , sasia ,vlera ,nrserik, barcodi ,shfrytzuesi ,koha) 
		VALUES ('$kerkoemriproduktit' , '$kerkoqmimishitjes' , '$sasiabuton' , '$vlera', '$nrserik' ,'$kerkobarkodi' , '$shfrytezuesi', '$kohasot')");
        $rezultatet->execute(array('emri' => $kerkoemriproduktit, 'qmimi' => $kerkoqmimishitjes, 'sasia' => $sasiabuton, 'vlera' => $vlera, 'nrserik' => $nrserik, 'barcodi' => $kerkobarkodi, 'shfrytzuesi' => $shfrytezuesi,'koha'=>$kohasot));
        return $rezultatet;
    }
    function nrserik() {
        $hyrja = "MF";
        $primary = "";
        $kodi = "";
        $kejtshitjet = new regjistrimimallitModels();
        $kejtshitjet->shitjet();
        foreach ($kejtshitjet->shitjet() as $row) {
            $primary = $row['produkti_id'];
        }
        $triki = strlen($primary);
        if ($primary === "") {
            $kodi = $hyrja . "000000" . "SOFT";
        } else {
            switch ($triki) {
                case "1":
                    $kodi = $hyrja . "00000" . $primary . "SOFT";
                break;
                case "2":
                    $kodi = $hyrja . "0000" . $primary . "SOFT";
                break;
                case "3":
                    $kodi = $hyrja . "000" . $primary . "SOFT";
                break;
                case "4":
                    $kodi = $hyrja . "00" . $primary . "SOFT";
                break;
                case "5":
                    $kodi = $hyrja . "0" . $primary . "SOFT";
                break;
                case "6":
                    $kodi = $hyrja . "" . $primary . "SOFT";
                break;
            }
        }
        return $kodi;
    }
    public function perditesomstatusinefatures($mbylljaefatures) {
        $results = Connection::dbconnect()->prepare("UPDATE shitjet_tbl SET statusifatures = '$mbylljaefatures'");
        $results->execute();
        return $results;
    }
    public function shfaqshitjet() {
        $results = Connection::dbconnect()->prepare("SELECT * FROM shitjet_tbl WHERE statusifatures = 'i hapur'");
        $results->execute();
        return $results;
    }
    public function totalishitjeve() {
        $shfaqrezultatet = Connection::dbconnect()->prepare("SELECT SUM(vlera) as vlera   FROM shitjet_tbl WHERE statusifatures = 'i hapur'");
        $shfaqrezultatet->execute();
        return $shfaqrezultatet->fetchAll();
    }
    public function fshirjaeshitjes($idshitja) {
        $results = Connection::dbconnect()->prepare("DELETE FROM shitjet_tbl WHERE produkti_id = '$idshitja'");
        $results->execute(array('produkti_id' => $idshitja));
    }
    public function shtoproduktinmeid($shitjameid, $sasiabuton, $nrserik) {
        $regjistrimiid = Connection::dbconnect()->prepare("SELECT * FROM regjistrimimallit_tbl WHERE id = '$shitjameid'");
        $regjistrimiid->execute(array('id' => $shitjameid));
        foreach ($regjistrimiid as $malli) {
            $kerkoemriproduktit1 = $malli['emriproduktit'];
            $kerkoqmimishitjes1 = $malli['qmimishitjes'];
            $kerkobarkodi1 = $malli['barkodi'];
            $shfrytezuesi1 = 'admin';
            $vlera1 = $kerkoqmimishitjes1 * $sasiabuton;
            $rezultatet = Connection::dbconnect()->prepare("
			INSERT INTO shitjet_tbl( emri , qmimi , sasia ,vlera ,nrserik, barcodi ,shfrytzuesi) 
			VALUES ('$kerkoemriproduktit1' , '$kerkoqmimishitjes1' , '$sasiabuton' , '$vlera1', '$nrserik' ,'$kerkobarkodi1' , '$shfrytezuesi1' )");
            $rezultatet->execute(array('emri' => $kerkoemriproduktit1, 'qmimi' => $kerkoqmimishitjes1, 'sasia' => $sasiabuton, 'vlera' => $vlera1, 'nrserik' => $nrserik, 'barcodi' => $kerkobarkodi1, 'shfrytzuesi' => $shfrytezuesi1,));
            return $rezultatet;
        }
    }
    public function shfaqkuponatfiskal() {
        $shfaqkuponat = Connection::dbconnect()->prepare("SELECT * FROM shitjet_tbl WHERE koha = CURDATE()");
        $shfaqkuponat->execute();
        return $shfaqkuponat->fetchAll();
    }
    public function shfaqkuponatfiskal1() {
        $shfaqkuponat = Connection::dbconnect()->prepare("SELECT emri,qmimi,sum(sasia) as sasia,sum(vlera) as vlera,koha FROM shitjet_tbl WHERE koha = CURDATE()");
        $shfaqkuponat->execute();
        return $shfaqkuponat->fetchAll();
    }
    public function shitja() {
        $shfaqkuponat = Connection::dbconnect()->prepare("SELECT SUM(vlera) as vlera ,emri,koha , sasia FROM shitjet_tbl WHERE date(koha) = CURDATE()");
        $shfaqkuponat->execute();
        return $shfaqkuponat->fetchAll();
    }
    public function fshirjaekuponit($fshikuponinid) {
        $results = Connection::dbconnect()->prepare("DELETE FROM shitjet_tbl WHERE produkti_id = '$fshikuponinid'");
        $results->execute(array('produkti_id' => $fshikuponinid));
    }
    public function selcetShitjet($data) {
        $shfaqshumentotaletekuponave = Connection::dbconnect()->prepare("SELECT * from shitjet_tbl WHERE koha = '$data'");
        $shfaqshumentotaletekuponave->execute();
        return $shfaqshumentotaletekuponave->fetchAll();
    }
    public function furnizimiSelekt($emriP) {
        $shfaqshumentotaletekuponave = Connection::dbconnect()->prepare("SELECT * from furnizimi_tbl WHERE emriproduktit_fk = '".$emriP."'");
        $shfaqshumentotaletekuponave->execute();
        return $shfaqshumentotaletekuponave->fetchAll();
    }

    
}
