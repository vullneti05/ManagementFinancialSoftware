<?php
class administrataModels {
    public function aktivizoklientin($emridatabazes, $tipidatabazes) {
        //krijo Tabela per biznese te vogla dhe te mesme
        $db = "
      CREATE TABLE arka_tbl (
        id_arka int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        puntoriparadites varchar(254) NOT NULL,
        puntorimasdites varchar(254) DEFAULT NULL,
        qmimiparadites varchar(254) DEFAULT NULL,
        qmimimasdites varchar(254) DEFAULT NULL,
        startimi varchar(254) NOT NULL,
        komentip varchar(254) DEFAULT NULL,
        komentim varchar(254) DEFAULT NULL,
        data varchar(254) DEFAULT NULL
      );
      CREATE TABLE borgji_tbl (
        idborgji int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        emri varchar(254) NOT NULL,
        telefoni varchar(254) NOT NULL,
        adresa varchar(254) NOT NULL,
        qmimi varchar(254) NOT NULL,
        mesazhi varchar(254) NOT NULL,
        shfrytzuesi varchar(254) NOT NULL,
        nrserikborgj varchar(254) DEFAULT NULL,
        koha timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
        statusi varchar(254) NOT NULL DEFAULT 'nepritje'
      );
      CREATE TABLE cash_tbl(
        idcash int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        emri varchar(254) NOT NULL,
        telefoni varchar(254) NOT NULL,
        adresa varchar(254) NOT NULL,
        qmimi varchar(254) NOT NULL,
        shfrytzuesi varchar(254) NOT NULL,
        mesazhi text NOT NULL,
        koha timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
        statusi varchar(254) NOT NULL DEFAULT 'nepritje'
      );
      CREATE TABLE furnizimi_tbl (
        id_furnizimi int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        emriproduktit_fk varchar(254) NOT NULL,
        qmimiblerjes varchar(254) NOT NULL,
        qmimishitjes varchar(254) NOT NULL,
        sasia varchar(254) NOT NULL,
        shifrafatures varchar(254) NOT NULL,
        emrifurnitorit varchar(254) NOT NULL,
        koha date NOT NULL,
        emrishfrytezuesit varchar(254) NOT NULL,
        statusi varchar(100) NOT NULL DEFAULT 'aktiv'
      );
      CREATE TABLE posta_tbl (
        idposta int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        emri varchar(254) NOT NULL,
        telefoni varchar(254) NOT NULL,
        adresa varchar(254) NOT NULL,
        qmimi varchar(254) NOT NULL,
        mesazhi text NOT NULL,
        shfrytzuesi varchar(254) NOT NULL,
        nrserikposta varchar(254) DEFAULT NULL,
        koha timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
        statusi varchar(254) NOT NULL DEFAULT 'nepritje'
      );
      CREATE TABLE regjistrimimallit_tbl (
        id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        emriproduktit varchar(254) NOT NULL,
        qmimishitjes varchar(254) NOT NULL,
        njesia varchar(254) NOT NULL,
        tvsh varchar(254) NOT NULL,
        sasiaminimale varchar(254) NOT NULL,
        pershkrimi text NOT NULL,
        barkodi varchar(254) NOT NULL
      );
      CREATE TABLE shfrytezuesit_tbl (
        id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        emri varchar(254) NOT NULL,
        pseudonimi varchar(254) NOT NULL,
        fjalkalimi varchar(254) NOT NULL,
        image varchar(254) NOT NULL,
        autorizimi varchar(254) DEFAULT NULL,
        statusi varchar(254) NOT NULL DEFAULT 'aktiv'
      );
      CREATE TABLE shitjet_tbl (
        produkti_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        emri varchar(254) NOT NULL,
        qmimi varchar(254) NOT NULL,
        sasia varchar(254) NOT NULL,
        vlera varchar(254) DEFAULT NULL,
        shfrytzuesi varchar(254) NOT NULL,
        koha varchar(100) NOT NULL,
        nrserik varchar(254) DEFAULT NULL,
        statusifatures varchar(254) NOT NULL DEFAULT 'i hapur',
        statusiporosise varchar(254) NOT NULL DEFAULT 'i rregullt',
        barcodi varchar(254) NOT NULL
      );

      INSERT INTO shfrytezuesit_tbl (id, emri, pseudonimi, fjalkalimi, image, autorizimi, statusi) VALUES
        (101, 'admin', 'admin', 'AWž=#1‰ÂâÃ¯EÁ–Å', 'user.png', 'klient,shitje,furnizimi,statistika,shfrytezues', 'aktiv');"


      ;
        $results = ADMConnection::admconnect()->prepare("CREATE DATABASE DB_" . $emridatabazes . " ");
        $results->execute();
        $newnamedb = "DB_".$emridatabazes;
        $results1 = ADMConnection::admconnect()->prepare("USE $newnamedb; " . $db);
        $results1->execute();

        $results3 = ADMConnection::admconnect()->prepare("INSERT INTO aktivizimidb_tbl(emridatabazes,tipidatabazes,koha) VALUES ('$emridatabazes','$tipidatabazes','1')");
        $results3->execute(array('emridatabazes' => $emridatabazes, 'tipidatabazes' => $tipidatabazes,));
        // return $results3;

    }












    public function deletebiznes($deleteid) {
        $selekto5 = ADMConnection::admconnect()->prepare("SELECT * FROM aktivizimidb_tbl WHERE id = '$deleteid'");
        $selekto5->execute();
        foreach ($selekto5->fetchAll() as $test) {
        }
        $fshidatabazen = ADMConnection::admconnect()->prepare("DROP DATABASE DB_" . $test['emridatabazes'] . "");
        if($fshidatabazen->execute()){
            session_unset($_SESSION['dbja']);
            session_unset('skadenca');
        };
        $results = ADMConnection::admconnect()->prepare("DELETE FROM aktivizimidb_tbl WHERE id ='$deleteid'");
        $results->execute(array('id' => $deleteid));
    }
    public function regjistrobiznes($kompania, $qyteti, $adresa, $nrbiznesit, $nrfiskal, $linku, $pronari, $nrtelefoni, $dataskadences, $nrartikujve, $databaza, $password,$qmimi, $statusi) {
        $results = ADMConnection::admconnect()->prepare("INSERT INTO bizneset_tbl ( kompania, qyteti, adresa, nrbiznesit, nrfiskal, linku , pronari, nrtelefoni, dataskadences, nrartikujve, databaza, password, qmimi, statusi) VALUES
         ('$kompania','$qyteti','$adresa','$nrbiznesit','$nrfiskal','$linku','$pronari','$nrtelefoni','$dataskadences','$nrartikujve','$databaza', '$password','$qmimi','$statusi')");
        $results->execute(array('kompania' => $kompania, 'qyteti' => $qyteti, 'adresa' => $adresa, 'nrbiznesit' => $nrbiznesit, 'nrfiskal' => $nrfiskal, 'linku' => $linku, 'pronari' => $pronari, 'nrtelefoni' => $nrtelefoni, 'dataskadences' => $dataskadences, 'nrartikujve' => $nrartikujve, 'databaza' => $databaza, 'password' =>$password, 'qmimi' => $qmimi, 'statusi' => $statusi,));
        return $results;
    }
    public function aktivizobizneset() {
        $results = ADMConnection::admconnect()->prepare("SELECT * FROM aktivizimidb_tbl");
        $results->execute();
        return $results->fetchAll();
    }
    public function veshtrobizneset() {
        $results = ADMConnection::admconnect()->prepare("SELECT * FROM bizneset_tbl");
        $results->execute();
        return $results->fetchAll();
    }
    public function ndryshobiznesin($biznesiID) {
        $results = ADMConnection::admconnect()->prepare("SELECT * FROM bizneset_tbl WHERE biznesi_id = '$biznesiID'");
        $results->execute(array('biznesi_id' => $biznesiID));
        return $results->fetch();
    }
    public function perditesobiznesin($editid, $editkompania, $editpronari, $editnrtelefoni, $editlinku, $editdataskadences, $editnrartikujve, $editstatusi) {
        $results = ADMConnection::admconnect()->prepare("UPDATE bizneset_tbl SET kompania = '$editkompania',pronari = '$editpronari',nrtelefoni = '$editnrtelefoni' ,  linku = '$editlinku' , dataskadences = '$editdataskadences' ,nrartikujve ='$editnrartikujve',statusi ='$editstatusi' WHERE biznesi_id = '$editid'");
        $results->execute();
        return $results;
    }
    public function shfaqbiznesinmeid($biznesi) {
        $results = ADMConnection::admconnect()->prepare("SELECT * FROM bizneset_tbl WHERE biznesi_id = '$biznesi'");
        $results->execute(array('biznesi_id' => $biznesi));
        return $results->fetch();
    }
    public function afatizobiznesin($dataeskadences, $pages, $afatizobiznes) {
        $results = ADMConnection::admconnect()->prepare("INSERT INTO pagesat_tbl ( qmimi_pageses, dataskadimit_pageses, id_biznesi ,koha ) VALUES ('$pages','$dataeskadences','$afatizobiznes' , now())");
        $results->execute(array('qmimi_pageses' => $qmimi_pageses, 'dataskadimit_pageses' => $dataeskadences, 'id_biznesi' => $afatizobiznes,));
        $results1 = ADMConnection::admconnect()->prepare("UPDATE bizneset_tbl SET  dataskadences = '$dataeskadences' , qmimi = '$pages' WHERE biznesi_id = '$afatizobiznes'");
        $results1->execute();
        return $results;
    }
    public function shfaqpagesat($biznesi) {
        $results = ADMConnection::admconnect()->prepare("SELECT * FROM pagesat_tbl WHERE id_biznesi = '$biznesi'");
        $results->execute();
        return $results->fetchAll();
    }
    public function krahasoadminin($user, $password) {
        $results = ADMConnection::admconnect()->prepare("SELECT * FROM admlogin WHERE user = '$user'");
        $results->bindParam(":user", $user, PDO::PARAM_STR);
        $results->execute();
        return $results->fetch();
    }
    public function fshibiznesin($fshijebizin) {
        $results = ADMConnection::admconnect()->prepare("DELETE  FROM bizneset_tbl WHERE biznesi_id = '$fshijebizin'");
        $results->bindParam(":biznesi_id", $fshijebizin);

        $results->execute();
      
    }
    public function ndryshoemridb($editdb) {
        $results = ADMConnection::admconnect()->prepare("SELECT * FROM aktivizimidb_tbl WHERE id = '$editdb'");
        $results->execute(array('id' => $editdb));
        return $results->fetch();
    }
    public function perditesodbname($dbname, $idedbs) {
        $results = ADMConnection::admconnect()->prepare("UPDATE aktivizimidb_tbl SET emridatabazes = '$dbname' WHERE id = '$idedbs'");
        $results->execute();
        return $results;
    }
    public function shfaqdbt(){
        $dbt = ADMConnection::admconnect()->prepare("SELECT * FROM aktivizimidb_tbl");
        $dbt->execute();
        return $dbt->fetchAll();
    }
    public function krahasodatabazen($databaza) {
        $results = ADMConnection::admconnect()->prepare("SELECT * FROM bizneset_tbl WHERE kompania = '$databaza'");
        $results->bindParam(":kompania", $databaza, PDO::PARAM_STR);
        $results->execute();
        return $results->fetch();
    }
    public function shfaqbiznesetpasive(){
        $biznesipasiv = ADMConnection::admconnect()->prepare("SELECT * FROM bizneset_tbl WHERE statusi ='pasiv'");
        $biznesipasiv->execute();
        return $biznesipasiv->fetchAll();
    }
   
    public function statusibiznesitpasiv($idbiznesi){
        $results = ADMConnection::admconnect()->prepare("UPDATE bizneset_tbl SET statusi = 'pasiv' WHERE biznesi_id  = '$idbiznesi'");
        $results->execute();
        return $results;
    }
    public function krahasoskadencen(){
        $results = ADMConnection::admconnect()->prepare("SELECT  * FROM bizneset_tbl");
    }
    public function iskaduar($emripronarit){
        $results= ADMConnection::admconnect()->prepare("SELECT * FROM bizneset_tbl WHERE kompania = '$emripronarit'");
        $results->bindParam(":kompania", $emripronarit, PDO::PARAM_STR);
        $results->execute();
        return $results->fetchAll();
    }
    
}