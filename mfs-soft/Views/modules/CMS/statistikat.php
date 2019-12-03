<?php 
$attributes = $_SESSION['autorizimi'];
$arrayAutorizim = explode(" ",$attributes); 
foreach($arrayAutorizim as $row1){ 

if(strpos($row1,"statistika")!==false) { 
?>

    <section id="statistikat">

        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 mt-3">
                    <div class="card color-black">
                        <div class="card-body">
                        <?php 
    						$numriidergesavemeposte = new statistikatModels();
    						$numrifaturave = $numriidergesavemeposte->vleraefurnizimit();
					    ?>
                        <p>Nr.Faturave te furnizimit</p>
                        <p class="s"><?php echo $numrifaturave?> </p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-3">
                    <div class="card color-primary">
                        <div class="card-body">
                            <?php
							$vlerablerse = new statistikatModels();
							$vlerablerse->vlerablerse();

							foreach($vlerablerse->vlerablerse() as $vlerat){
								 $vlerablerese =  $vlerat['qmimiblerjes'] * $vlerat['sasia'];
								 $vlerashitese =  $vlerat['qmimishitjes'] * $vlerat['sasia'];
							}
						?>
                                <p>Vlera e faturave blerse</p>
                                <p class="s">
                                    <?php echo  $vlerablerese;?> $</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-3">
                    <div class="card color-success">
                        <div class="card-body">
                            <p>Vlera Shitese</p>
                            <p class="s">
                                <?php echo $vlerashitese;?>$</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-3">
                    <div class="card color-warning">
                        <div class="card-body">
                            <?php 

	$veshtrimifaturavepasive = new furnizimiModels();
	$a = Connection::dbconnect()->prepare("SELECT * FROM regjistrimimallit_tbl");
	$a->execute();
	$count = 0;
	foreach($a as $malli){
		$x1 =0;
		$y1 =0;

		$x = Connection::dbconnect()->prepare("SELECT koha , sum(sasia) AS sasiaefurnizimit , koha , qmimiblerjes FROM furnizimi_tbl WHERE emriproduktit_fk = '".$malli['emriproduktit']."'");
		$x->execute();
		$row = $x->fetchAll();

		foreach($row as $j){
			$x1 = $j['sasiaefurnizimit'];
			$koha = $j['koha'];
			$qmimiblerjes = $j['qmimiblerjes'];

		}
		$y = Connection::dbconnect()->prepare("SELECT sum(sasia) AS sasiaeshitjes FROM shitjet_tbl WHERE emri = '".$malli['emriproduktit']."'");
		$y->execute();
		$row2 = $y->fetchAll();

		foreach($row2  as $j){
			$y1 = $j['sasiaeshitjes'];
		}
		$z = $x1-$y1;
		$c = $z*$qmimiblerjes;

		$count = $count+$c;
	}

?>
                                <p>Vlera stokut</p>
                                <p class="s">
                                    <?php echo $count?>$</p>
                        </div>
                    </div>
                </div>
                <!-- End -->

                <script>
                    // Donut Charts Dashboard
                    window.onload = function() {

                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            title: {
                                text: "",
                                horizontalAlign: "left"
                            },
                            data: [{
                                type: "doughnut",
                                startAngle: 60,
                                //innerRadius: 60,
                                indexLabelFontSize: 17,
                                indexLabel: "{label} - #percent%",
                                toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                                dataPoints: [{
                                    y: ,
                                    label: "Shitje"
                                }, {
                                    y: 28,
                                    label: "Furnzim"
                                }, {
                                    y: 10,
                                    label: "Furnzim"
                                }, {
                                    y: 7,
                                    label: "Shitje"
                                }, ]
                            }]
                        });
                        chart.render();
                    }
                </script>

                <div class="col-lg-3 col-md-6 mt-5">
                    <div class="form-group">
                        <form method="POST">
                            <div class="form-group">
                                <select class="form-control" name="viti">
                                    <option>viti</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <select class="form-control" name="mbarimivitit">
                                    <option>viti</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-5">
                    <div class="form-group">
                        <select class="form-control" name="muaji">
                            <option>muaji</option>
                            <option value="01">janar</option>
                            <option value="02">shkurt</option>
                            <option value="03">mars</option>
                            <option value="04">prill</option>
                            <option value="05">maj</option>
                            <option value="06">qershor</option>
                            <option value="07">korrik</option>
                            <option value="08">gusht</option>
                            <option value="09">shtator</option>
                            <option value="10">tetor</option>
                            <option value="11">nentor</option>
                            <option value="12">dhjetor</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <select class="form-control" name="mbarimimuajit">
                            <option>muaji</option>
                            <option value="01">janar</option>
                            <option value="02">shkurt</option>
                            <option value="03">mars</option>
                            <option value="04">prill</option>
                            <option value="05">maj</option>
                            <option value="06">qershor</option>
                            <option value="07">korrik</option>
                            <option value="08">gusht</option>
                            <option value="09">shtator</option>
                            <option value="10">tetor</option>
                            <option value="11">nentor</option>
                            <option value="12">dhjetor</option>
                        </select>
                    </div>
                </div>
                <!-- 			<div class="col-lg-3 col-md-6 mt-5">
				<div class="form-group">
					<button type="submit" class="btn" name="filtromemuaj">Filtro</button>
				</div>

			</div> -->
                <div class="col-lg-3 col-md-6 mt-5">
                    <button class="btn" name="krahasoperiudhat">Krahaso periudhat</button>
                </div>
                </form>

                <div class="col-lg-6 col-md-6 mt-5">
            
                    <div id="chartContainer1" style="width: 55%; height: 500px;"></div>
                </div>

                <div class="col-lg-6 col-md-6 mt-5">
                    <div id="chartContainer2" style="width: 55%; height: 500px;"></div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <a href="" class="btn d-flex">
                        <img src="Views/assets/images/Icon feather-printer.png" class="ml-3" alt="">
                        <p class="ml-3 mt-1" onclick="window.print();">Printo</p>
                    </a>
                </div>

                <?php

	// if(isset($_POST['filtromemuaj'])){

	// 	$results = new statistikatModels();
	// 	$viti = $_POST['viti'];
	// 	$muaji = $_POST['muaji'];
	// 	$filtro = $viti.'-'.$muaji;

	// 	$results->krahasomemuaj($filtro);
	// 	foreach($results->krahasomemuaj($filtro) as $shitjet){
	// 			$qmimiishitjes = $shitjet['qmimi'];
	// 	}
	// }
	if(isset($_POST['krahasoperiudhat'])){

		$results = new statistikatModels();
		$viti = $_POST['viti'];
		$muaji = $_POST['muaji'];
		$filtro = $viti.'-'.$muaji;

		$results->krahasomemuaj($filtro);
		foreach($results->krahasomemuaj($filtro) as $shitjet){
				$qmimiishitjes = $shitjet['qmimi'];
				$qmimiisasise = $shitjet['sasia'];
				$shitja = $qmimiishitjes * $qmimiisasise;

		}
		$results1 = new statistikatModels();
		$results1->krahasomemuajfurnizimin($filtro);
		foreach($results1->krahasomemuajfurnizimin($filtro) as $furnizimi){
				$qmimiifurnizimit = $furnizimi['qmimiblerjes'];
				$qmimiisasisesefurnizimit = $furnizimi['sasia'];
				$shitjafurnizimi = $qmimiifurnizimit * $qmimiisasisesefurnizimit;

		}	
		$results2 = new statistikatModels();
		$viti2 = $_POST['mbarimivitit'];
		$muaji2 = $_POST['mbarimimuajit'];
		$filtro2 = $viti2.'-'.$muaji2;

		$results2->krahasomemuaj1($filtro2);
		foreach($results2->krahasomemuaj1($filtro2) as $shitjet2){
				$qmimiishitjes2 = $shitjet2['qmimi'];
				$qmimiisasise2 = $shitjet2['sasia'];
				$shitja2 = $qmimiishitjes2 * $qmimiisasise2;

		}
		$results3 = new statistikatModels();
		$results3->krahasomemuajfurnizimin1($filtro2);
		foreach($results3->krahasomemuajfurnizimin1($filtro2) as $furnizimi3){
				$qmimiifurnizimit3 = $furnizimi3['qmimiblerjes'];
				$qmimiisasisesefurnizimit3 = $furnizimi3['sasia'];
				$shitjafurnizimi3 = $qmimiifurnizimit3 * $qmimiisasisesefurnizimit3;

		}	
   
	}
if(isset($_POST['krahasoperiudhat'])){

	$fitimi = $shitja2 - $shitja;

if (strpos($fitimi, '-') !== false) {
    $mesazhi = "Minus";
    $mesazhi2 = "Humbje";
    $tagi = "<span style='background-color:#bb0000;color:#fff;height:200px;padding:10px;'>";
    $tagi2 = "</span>";
}else{
	$tagi = "<p style='background-color:green;color:#fff;height:200px;padding:10px;'>";
	$mesazhi = "Plus";
	$mesazhi2 = "Ngritje";
	$tagi2 = "</p>";
}
	if(isset($_POST['viti'])
		&& isset($_POST['muaji']) 
		&& isset($_POST['mbarimivitit']) 
		&& isset($_POST['mbarimimuajit'])){

		if($_POST['viti'] != "viti" && $_POST['muaji'] !="muaji" && $_POST['mbarimivitit'] !="viti" && $_POST['mbarimimuajit'] !="muaji"){

	echo $tagi ;

	echo "Nga Muaji ".$muaji." të vitit: ".$viti." ju keni pasur ".$shitja."euro shitje , dhe keni pasur furnizim ".$shitjafurnizimi." euro <br>";
	echo "Kurse Nga Muaji ".$muaji2." të vitit: ".$viti2." ju keni pasur ".$shitja2."euro shitje , dhe keni pasur furnizim ".$shitjafurnizimi3." euro <br>";

	echo  "llogaritjet nga muaji ".$muaji."-".$viti." deri më ".$muaji2."-".$viti2." janë si vijojnë : ";
	echo   "<br>";

	echo   " Nga ".$muaji2."-".$viti2." Ju jeni ne ".$mesazhi." (".$fitimi.") dhe ju jeni në ".$mesazhi2. " te biznesit tuaj ";

	echo  $tagi2;
}
}

}

?>

                    <script>
                        // Donut Charts Dashboard
                        window.onload = function() {

                                var chart = new CanvasJS.Chart("chartContainer2", {
                                    animationEnabled: true,
                                    title: {
                                        text: "Statistikat",
                                    },

                                    data: [{
                                        type: "pie",
                                        showInLegend: true,
                                        dataPoints: [{
                                                y: <?php 
						if(isset($_POST['krahasoperiudhat'])){
							echo $shitjafurnizimi;
						}else{
							echo 1;
						}
					?>,
                                                legendText: "Furnizimi",
                                                indexLabel: "Furnizimi"
                                            },

                                            {
                                                y: <?php 
						if(isset($_POST['krahasoperiudhat'])){
							echo $shitja;
						}else{
							echo 1;
						}
					?>,
                                                legendText: "Shitja",
                                                indexLabel: "Shitja"
                                            },
                                        ]
                                    }, ]
                                });
                                chart.render();

                                var chart1 = new CanvasJS.Chart("chartContainer1", {
                                    animationEnabled: true,
                                    title: {
                                        text: "Statistikat",
                                    },
                                    data: [{
                                        type: "pie",
                                        showInLegend: true,
                                        dataPoints: [{
                                                y: <?php 
						if(isset($_POST['krahasoperiudhat'])){
							echo $shitjafurnizimi3;
						}else{
							echo 1;
						}
					?>,
                                                legendText: "Furnizimi",
                                                indexLabel: "Furnizimi"
                                            },

                                            {
                                                y: <?php 
						if(isset($_POST['krahasoperiudhat'])){
							echo $shitja2;
						}else{
							echo 1;
						}
					?>,
                                                legendText: "Shitja",
                                                indexLabel: "Shitja"
                                            },
                                        ]
                                    }, ]
                                });
                                chart1.render();

                            }
                            // // Donut Charts Dashboard
                    </script>

            </div>
        </div>
    </section>
    <?php  
}else{
 echo "<script>window.location.href='stoku'</script>";
  } 
} ?>