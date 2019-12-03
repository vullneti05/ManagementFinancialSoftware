<?php
class shfrytzuesitModels {
    public function shtoshfrytzues($emri, $pseudonimi, $fjalkalimi, $image, $akseset) {
        $results = Connection::dbconnect()->prepare("INSERT INTO shfrytezuesit_tbl(emri , pseudonimi , 
			fjalkalimi, image,autorizimi)
			VALUES 
			('$emri' , '$pseudonimi' , AES_ENCRYPT('$fjalkalimi', 'secret'),'$image','$akseset')");
        $results->execute(array('emri' => $emri, 'pseudonimi' => $pseudonimi, 'fjalkalimi' => $fjalkalimi, 'image' => $image, 'akseset' => $akseset,));
        return $results;
    }
    public function shfaqshfrytzuesit() {
        $results = Connection::dbconnect()->prepare("
	SELECT AES_DECRYPT(`fjalkalimi`, 'secret') AS fjalkalimi , emri , pseudonimi , id, image , autorizimi FROM shfrytezuesit_tbl");
        $results->execute();
        return $results->fetchAll();
    }
    public function fshishfrytzuesin($fshiid) {
        $results = Connection::dbconnect()->prepare("DELETE FROM shfrytezuesit_tbl WHERE id = '$fshiid'");
        $results->execute(array('id' => $fshiid));
    }
    public function ndryshotedhenateshfrytzuesit($editid) {
        $results = Connection::dbconnect()->prepare("SELECT AES_DECRYPT(`fjalkalimi`, 'secret') AS fjalkalimi , emri , pseudonimi , id, image , autorizimi FROM shfrytezuesit_tbl WHERE id = '$editid'");
        $results->execute(array('id' => $editid));
        return $results->fetch();
    }
    public function Perditesoshfrytezuesit($editid, $editemri, $editpseudonimi, $editfjalkalimi, $image, $editakseset) {
        $results = Connection::dbconnect()->prepare("
		 	UPDATE shfrytezuesit_tbl 

		 	SET  emri 		= '$editemri' , 
		 		 pseudonimi = '$editpseudonimi',
		 		 fjalkalimi = AES_ENCRYPT( '$editfjalkalimi', 'secret' ),
		 		 image 		= '$image',
		 		 autorizimi = '$editakseset'

	     	WHERE id = '$editid'");
        $results->execute();
        return $results;
    }
    public function Perditesoshfrytezuesitpafjalkalim($editid, $editemri, $editpseudonimi, $image, $editakseset) {
        $results = Connection::dbconnect()->prepare("
		 	UPDATE shfrytezuesit_tbl 

		 	SET  emri 			= '$editemri' , 
		 		 pseudonimi 	= '$editpseudonimi',
		 		 image 			= '$image',
		 		 autorizimi 	= '$editakseset'
		 		

	     	WHERE id = '$editid'");
        $results->execute();
        return $results;
    }
    public function Perditesoshfrytezuesitmefjalkalim($editid, $editemri, $editpseudonimi, $editfjalkalimi, $editakseset) {
        $results = Connection::dbconnect()->prepare("
		 	UPDATE shfrytezuesit_tbl 

		 	SET  emri 		= '$editemri' , 
		 		 pseudonimi = '$editpseudonimi',
		 		 fjalkalimi = AES_ENCRYPT( '$editfjalkalimi', 'secret' ),
		 		 autorizimi = '$editakseset'

	     	WHERE id = '$editid'");
        $results->execute();
        return $results;
    }
    public function Perditesoshfrytezuesitpafoto($editid, $editemri, $editpseudonimi, $editfjalkalimi, $editakseset) {
        $results = Connection::dbconnect()->prepare("
		 	UPDATE shfrytezuesit_tbl 

		 	SET  emri = '$editemri' , 
		 		 pseudonimi = '$editpseudonimi',
		 		 fjalkalimi = AES_ENCRYPT( '$editfjalkalimi', 'secret' ),
		 		 autorizimi = '$editakseset'

	     	WHERE id = '$editid'");
        $results->execute();
        return $results;
    }
    public function Krahaso($loginpseudonimi, $loginfjalkalimi) {
        $results = Connection::dbconnect()->prepare("SELECT  AES_DECRYPT(`fjalkalimi`, 'secret') AS fjalkalimi , emri , pseudonimi , id, image , autorizimi FROM shfrytezuesit_tbl WHERE pseudonimi = '$loginpseudonimi' AND fjalkalimi = AES_ENCRYPT('$loginfjalkalimi', 'secret')");
        $results->bindParam(":pseudonimi", $loginpseudonimi, PDO::PARAM_STR);
        $results->bindParam(":fjalkalimi", $encrypt, PDO::PARAM_STR);
        $results->execute();
        return $results->fetch();
    }
}
?>