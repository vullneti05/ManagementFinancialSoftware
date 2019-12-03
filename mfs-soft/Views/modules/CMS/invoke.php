<?php
	
	// ini_set("session.auto_start", 0);
	// define('FPDF_FONTPATH','Views/modules/cms/fpdf17/font/');
	require('Views/modules/cms/fpdf17/fpdf.php');
// array(400,450)
	$pdf = new FPDF('p','mm','A4');

	$pdf->AddPage();

	$pdf->SetFont('Arial','',12);

	$pdf->Ln(10);
	$query = Connection::dbconnect()->prepare("SELECT * FROM shitjet_tbl WHERE statusifatures = 'i hapur'");
	$query->execute();
	// $query2 = Connection::dbconnect()->prepare("SELECT SUM(sasia) as sasia , SUM(qmimi) as qmimi ,koha FROM shitjet_tbl WHERE statusifatures ='i hapur'");
	// $query2->execute();
	$getdata = $query->fetchAll(PDO::FETCH_ASSOC);
	$count= 0;
	$count2 = 0;
	$artikujt = 0;
   foreach ($getdata as $row){
   	$nrserik = $row['nrserik'];
   	$artikujt=$artikujt+1;
   	$koha = $row['koha'];
     $shuma = $row['sasia'] * $row['qmimi'];
    $count = $count+10;
    $count2 = $count+1;

	/* --- Cell --- */
	$pdf->SetXY(13, 113);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(10, $count, $row['emri'], 0, 1, 'L', false);
	/* --- Cell --- */
	$pdf->SetXY(155, 113);
	$pdf->Cell(5, $count, $row['sasia'].'  	x	', 0, 1, 'L', false);
	$pdf->SetXY(13, 115);
	$pdf->Cell(5, $count2, '------------------------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'L', false);
	/* --- Cell --- */
	$pdf->SetXY(165, 113);
	$pdf->Cell(5, $count,"  ". $shuma.' euro', 0, 1, 'L', false);
	/* --- Text --- */
	
	// $pdf->Ln(10);
	// /* --- Text --- */
	// $pdf->Text(16, 129, '-----------------------------------------------------------------------------------------------------------------------------------------');
 
   }
if(isset($_GET['totali'])){
$total=$_GET['totali'];
$pdf->Text(10, 170, 'TOTALI NE EURO');
/* --- Text --- */
$pdf->Text(167, 170, $total." euro");
}
/* --- Text --- */


$pdf->Ln(10);
if(isset($_GET['pagoi'])){
$pagoi=$_GET['pagoi'];
/* --- Text --- */
$pdf->Text(10, 175, 'PARA TE GATSHME');
/* --- Text --- */
$pdf->Text(167, 175, $pagoi." euro");
}

$pdf->Ln(10);
/* --- Text --- */
if(isset($_GET['kusuri'])){
	$kusuri=$_GET['kusuri'];
$pdf->Text(10, 180, 'Kusuri ');

/* --- Text --- */
$pdf->Text(167, 180, $kusuri." euro");
}

$pdf->Ln(10);

$pdf->Ln(10);
/* --- Text --- */
$pdf->Text(90, 195, 'ARTIKUJT : '.$artikujt);


/* --- Text --- */
$pdf->Text(132, 195, 'KASIERI: "'.$_SESSION['kasieri'].'"');

/* --- Text --- */
$pdf->Text(10, 195, 'data: '.$koha);
/* --- Text --- */

$pdf->Ln(10);
/* --- Text --- */
$pdf->SetFont('', 'B', 10);
$pdf->Text(10, 200, 'NR. SERIK');
/* --- Text --- */
$pdf->Text(151, 200, $nrserik);
$pdf->Ln(10);
/* --- Text --- */

 
// $pdf->Cell(180,5,'Pronari i OTREKS.com : Vullnet Selmani');

ob_start();
$pdf->Output();
$pdf->Close();
// ob_end_flush(); 
?>
