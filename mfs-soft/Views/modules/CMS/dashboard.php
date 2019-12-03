<?php 

$attributes = $_SESSION['autorizimi'];
$arrayAutorizim = explode(" ",$attributes); 
foreach($arrayAutorizim as $row1){ 

if(strpos($row1,"shitje")!==false) { 
?>
    <section id="dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-8">
                                    <div class="">
                                        <div class="card-body">
                                            <p class="font-weight-bold" title="Qeshtu apo bim">
                                                Barkodi ose Artikulli 
                                               <button class="btn" id="zoom-in">
                                                    <i class="fas fa-expand"></i>
                                                </button>
                                            </p>
                                            <form>
                                                <div class="input-group">
                                                    <input type="search" class="form-control" placeholder="Skano barkodin, ose sheno me fjale" name="searchtext" id="searchtext" oninput="kerko()">
                                                    <div class="input-group-append">
                                                        <?php 
													$numriserikiproduktit = new furnizimiModels();
													$numriserikiproduktit->nrserik();
												?>
                                                            <input type="text" class="form-control d-none" value="<?php echo $numriserikiproduktit->nrserik();?>" disabled="" id="nrserik" >

                                                            <input type="number" min="1" class="form-control span" placeholder="Sasia" id="sasiabuton" value="1" onkeyup="if(!this.checkValidity()){this.value='';alert('Nuk lejohen shuma negative')};"> 
                                                            <button class="btn" type="button" id="testa" onclick="shto()">Shto</button>
                                                    </div>
                                            </form>
                                            <div class="custom-table-scroll col-lg-11 col-md-12 pr-3">
                                                <table class="table bg-white">
                                                    <!-- 			<thead>
									<tr>

									</tr>
								</thead> -->
                                                    <tbody id="results">

                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="card custom-card-js">
                                        <p class="font-weight-bold p-3">Totali:</p>
                                        <div class="d-flex mb-4 mt-2 custom-total">
                                            <div id="here" class="form-group">
                                                <?php 
										$totali = new furnizimiModels();
										$totali->totalishitjeve();
                                       
										foreach($totali->totalishitjeve() as $tegjithameposte){

											$_SESSION['vlera'] = number_format((float)$tegjithameposte['vlera'], 2, '.', '');	

								}
										?>
                                                    <?php 
								if($test == ''){

							echo '<input type="text" min="1" id="totali2" class="form-control input-total-dashboard text-center ml-0" disabled value="0.00 €">';
											}else{
											  
							echo '
								<div class="input-group-append custom-input-kusuri-euro">
								<input type="text"  id="totali2" class="form-control input-total-dashboard text-center ml-0" disabled="" value="'.$_SESSION['vlera'].' " >
								<h1 style="margin-top:10px;margin-right:100px;font-style:bold;font-size:50px;">€</h1>
																	</div>
							';
											}
										?>

                                            </div>
                                        </div>
                                    </div>

                            
                                    <button class="btn w-100 custom-btn-pages text-white" data-toggle="modal" data-target="#pages" onclick="pagesa()">Pages</button>
                                    <div class="d-flex mt-4">
                                        <button class="btn btn-primary btn-printo" onclick="printDatas();">Printo faturen</button>
                                        <button class="btn btn-primary btn-lexok ml-auto" data-toggle="modal" data-target="#lexokuponat" id="lexoj" type="button" onclick="lexojkuponaat()">Lexo kuponat</button>
                                    </div>
                                    <script>

                                    </script>
                                    <div class="d-flex mt-4">
                                        <button class="btn btn-primary btn-post" data-toggle="modal" data-target="#Post" onclick="calcPost();">Post</button>
                                        <button class="btn btn-primary btn-borgj ml-auto" data-toggle="modal" data-target="#Borgj" onclick="calcBorgj();">Borgj</button>
                                        <button class="btn btn-primary btn-cash ml-auto" data-toggle="modal" data-target="#Cash">Cash</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-body">
                            <p class="font-weight-bold mt-2 ml-1">Në Faturë</p>
                            <div class="custom-table-scroll">
                                <table class="table bg-white" cellpadding="4" id="printTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nr.Serik</th>
                                            <th>Emri i produktit</th>
                                            <th>Qmimi</th>
                                            <th>Sasia</th>
                                            <th>Vlera</th>
                                            <th id="option-th">Opcione</th>
                                        </tr>
                                    </thead>
                                    <tbody id="shitjet">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal POST-->
        <div class="modal fade custom-modal-post" id="Post" tabindex="-1" role="dialog" aria-labelledby="custom-modal-post" aria-hidden="true">
            <div class="modal-dialog modal-side modal-bottom-right modal-lg border-0" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header border-0">
                        <p class="modal-title" id="custom-modal-post">Sheno detajet e klienti</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="Views/assets/images/Icon feather-x-circle.png" alt="">
                        </button>
                    </div>
                    <div class="modal-body border-0">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Emri Mbiemri</label>
                                        <input type="text" min="1" class="form-control" name="" id="emri">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Adresa</label>
                                        <input type="text" min="1" class="form-control" name="" id="adresa">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nr Telefonit</label>
                                        <input type="number" min="1" class="form-control" name="" id="telefoni">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Qmimi</label>
                                        <input type="number" min="1" class="form-control" name="" id="qmimi">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="">Koment</label>
                                        <div class="input-group w-100">
                                            <textarea class="form-control border-0" id="mesazhi" rows="3"></textarea>
                                            <input type="text" value="poste" id="poste" class="d-none">
                                        </div>
                                    </div>
                                </div>
                                <?php 
								$numriserikipostes = new furnizimiModels();
								$numriserikipostes->nrserik();
								?>
                                    <input type="text" class="form-control d-none" value="<?php echo $numriserikipostes->nrserik();?>" disabled="" id="nrserikposta">

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button class="btn w-50" onclick="shtomeposte()" id="posta">Dergo</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
        </script>
        <!-- Modal Borgj-->
        <div class="modal fade custom-modal-post" id="Borgj" tabindex="-1" role="dialog" aria-labelledby="custom-modal-Borgj" aria-hidden="true">
            <div class="modal-dialog modal-lg border-0" role="document">
                <div class="modal-content border-0 borgj-custom">
                    <div class="modal-header border-0">
                        <p class="modal-title" id="custom-modal-Borgj">Borgj</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="Views/assets/images/Icon feather-x-circle.png" alt="">
                        </button>
                    </div>
                    <div class="modal-body border-0">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Emri Mbiemri</label>
                                        <input type="text" min="1" class="form-control" name="" id="emriborgjit">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Adresa</label>
                                        <input type="text" min="1" class="form-control" name="" id="adresaborgjit">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nr Telefonit</label>
                                        <input type="number" min="1" class="form-control" name="" id="telefoniborgjit">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Qmimi</label>
                                        <input type="number" min="1" class="form-control" name="" id="qmimiborgjit">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="">Koment</label>
                                        <div class="input-group w-100">
                                            <textarea class="form-control border-0 borgj-custom" id="mesazhiborgjit" rows="3"></textarea>
                                            <input type="text" value="borgj" id="borgj" class="d-none">
                                        </div>
                                        <?php 
								$numriserikborgj = new furnizimiModels();
								$numriserikborgj->nrserik();
								?>
                                            <input type="text" class="form-control d-none" value="<?php echo $numriserikborgj->nrserik();?>" disabled="" id="nrserikborgj">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn w-50" onclick="regjistroborgj()">Regjistro</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Cash-->
        <div class="modal fade custom-modal-post" id="Cash" tabindex="-1" role="dialog" aria-labelledby="custom-modal-Cash" aria-hidden="true">
            <div class="modal-dialog modal-xl border-0" role="document">
                <div class="modal-content border-0 cash-custom">
                    <div class="modal-header border-0">
                        <p class="modal-title" id="custom-modal-Cash">Sheno detajet e klienti</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="Views/assets/images/Icon feather-x-circle.png" alt="">
                        </button>
                    </div>
                    <div class="modal-body border-0">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Emri Mbiemri</label>
                                        <input type="text" min="1" class="form-control" name="" id="emricash">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Adresa</label>
                                        <input type="text" min="1" class="form-control" name="" id="adresacash">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nr Telefonit</label>
                                        <input type="number" min="1" class="form-control" name="" id="telefonicash">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Qmimi</label>
                                        <input type="number" min="1" class="form-control" name="" id="qmimicash">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="">Koment</label>
                                        <div class="input-group w-100">
                                            <textarea class="form-control border-0 cash-custom" id="mesazhicash" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn w-50" onclick="dergocash()">Dergo</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Pages -->
        <div class="modal fade custom-modal-pages" id="pages" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="custompages" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-0">
                    <div class="modal-body border-0">
                        <div class="col-md-12">
                            <form action="" id="printTable2">
                                <div class="d-flex mb-4 mt-2 custom-total">
                                    <div class="form-group d-flex">
                                        <label class="font-weight-bold ml-2 p-3 mt-4 pt-3">Kusuri</label>
                                        <input type="text" class="form-control custom-input-kursori w-75 ml-auto mt-4 mr-4" id="kusuri" placeholder="0.0" disabled>
                                        <div class="input-group-append custom-input-kusuri-euro">
                                            <span class="input-group-text text-left">&euro;</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <label for="" class="font-weight-bold ml-4 pr-2 mt-3">Totali</label>
                                    <input type="text" class="form-control w-75 ml-auto mt-0 mr-4 input-print" name="" id="total">
                                </div>
                                <div class="form-group d-flex">
                                    <label for="" class="font-weight-bold ml-4 mt-3 mr-1" style="margin-left: 28px!important;">Pagoi</label>
                                    <input type="text" class="form-control w-75 ml-auto mt-0 mr-4" name="" id="pagoi" oninput="llogaritkusurin();">
                                </div>
                            </form>

                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="d-flex">
                                <div class="custom-control custom-checkbox">
                                    <label for="" class="font-weight-bold mt-0 ml-1 mr-5 mt-2">Printo</label>

                                    <input type="checkbox" class="checkit custom-control-input" name="smoking" id="smoking" value="1" onclick=" qa()" />
                                    <label class="custom-control-label c-check" for="smoking" name="yesnos" id="yesnos"></label>
                                </div>
                            </div>
                        </div>
                        <script>
                            function qa() {
                                var a = document.getElementById('kusuri').value;
                                var b = document.getElementById('pagoi').value;
                                var c = document.getElementById('total').value;

                                if (a != "" && b != "" && c != "") {
                                    window.location.href = "invoke?kusuri=" + a + "&pagoi=" + b + "&totali=" + c + "";
                                } else {
                                    window.location.href = "invoke?kusuri=0&pagoi=0&totali=0";
                                }

                            }
                        </script>
                    </div>
                    <button class="btn w-100" onclick="mbyllfaturen2()">Mbyll faturen</button>
                </div>
            </div>
        </div>
        <!-- Lexo Kuponat -->
        <div class="modal fade custom-modal-lexokuponat" id="lexokuponat" tabindex="-1" role="dialog" aria-labelledby="custom-lexo-kuponat" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header border-0">
                        <p class="modal-title" id="custom-modal-Cash">Lexo kuponat ditore</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="Views/assets/images/Icon-black-x-circle.png" alt="">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group d-flex ml-1">
                                        <input type="text" class="form-control w-100 " placeholder="Kerko mallin" name="searchmall1" id="searchmall1">
                                        <i class="fa fa-search icon-search"></i>
                                    </div>

                                    <div class="custom-table-scroll" id="printoKuponatFiskal">
                                        <table class="table bg-white" id="kuponatreload">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Emri i produktit</th>
                                                    <th>Qmimi</th>
                                                    <th>Sasia</th>
                                                    <th>Vlera</th>
                                                    <th id="option-th1">Opcione</th>
                                                </tr>
                                            </thead>
                                            <tbody id="shfaqkuponatfiskal">

                                            </tbody>
                                        </table>
                                        <script>
                                            $(document).ready(function() {
                                                $("#searchmall1").on("keyup", function() {
                                                    var value = $('#searchmall1').val().toLowerCase();
                                                    $("#shfaqkuponatfiskal tr").filter(function() {
                                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                    });
                                                });
                                            });
                                        </script>
                                        <?php 
					    $today = date("Y-m-d");

						$leximiIShitjeveDitore = new furnizimiModels();
						$leximiIShitjeveDitore1 = $leximiIShitjeveDitore->selcetShitjet($today);
						$sumShitjet = 0;
						$count = 0;
						foreach($leximiIShitjeveDitore1 as $shfaqiShitjet){
							$sumShitjet += $shfaqiShitjet['qmimi'] * $shfaqiShitjet['sasia'];
							$count++;
						}
					?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 

						$dataSod = date("Y-m-d");
						$vleraBlerse = 0;
						$sumVlerat = 0;
						$shfaqshumatekuponave = new furnizimiModels();
						$SelektojTeGjithaShitjest = $shfaqshumatekuponave->selcetShitjet($dataSod);
						$testSasia = array();
						$testQmimi = array();
						$rezult = 0;
						$sum = 0;
						$nr = 0;

						foreach($SelektojTeGjithaShitjest as $shfaqikuponat){
							$emriP = $shfaqikuponat['emri'];
							$qmimi =$shfaqikuponat['qmimi'] ;
							$vleraShitse  = $shfaqikuponat['vlera'];
							$perKalkulim  = $shfaqikuponat['sasia'];
							$testSasia[$nr] =$perKalkulim;
							$sumVlerat += $vleraShitse;

							$selektoVlerenBlerseTeProduktit = $shfaqshumatekuponave->furnizimiSelekt($emriP);

								foreach($selektoVlerenBlerseTeProduktit as $shfaqVlerat){
									$testQmimi[$nr] = $shfaqVlerat['qmimiblerjes'];
									$vleraKaluluese = $vleraBlerse * $perKalkulim;
								}
								$nr++;

					}

					for($i = 0;$i<$nr;$i++){

						$sum = $testSasia[$i] * $testQmimi[$i];	
						$rezult  = $rezult + $sum;

					}
					   $toaliFitimit = $sumVlerat-$rezult;

					?>

                            <div class="row ml-4 mt-5 custom-sell " id="shitjetekuponave">
                                <div class="col-lg-6 col-md-12">
                                    <p>Shitja Totale:
                                        <label for="">
                                            <?php echo $sumVlerat." €";?></label>

                                    </p>

                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <p>Fitimi   :
                                        <label for="">
                                            <?php echo $toaliFitimit." €";?>
                                        </label>
                                    </p>
                                </div>

                            </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-close" data-dismiss="modal">Mbyll</button>
                    <button type="button" class="btn btn-save-edit" onclick="printokuponat();">
                        <img src="Views/assets/images/Icon feather-printer.png" alt="">
                        <label class="ml-2">Printo</label>
                    </button>
                </div>
            </div>
        </div>
        </div>
        <!-- Modal Edit -->
        <div class="modal fade custom-modal-edit" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <p class="modal-title" id="custom-modal-Cash">Perditso te dhenat</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="Views/assets/images/Icon-black-x-circle.png" alt="">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 mt-md-0 mt-lg-5">
                                    <div class="form-group">
                                        <label for="">Emri Produktit</label>
                                        <input type="text" class="form-control" name="" id="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Qmimi</label>
                                        <input type="number" min="1" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mt-md-0 mt-lg-5">
                                    <div class="form-group">
                                        <label for="">Sasia</label>
                                        <input type="number" min="1" class="form-control" name="" id="">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Vlera</label>
                                        <input type="number" min="1" class="form-control" name="" id="">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mt-md-0 mt-lg-5">
                                    <div class="form-group">
                                        <label for="">Numri Serik</label>
                                        <input type="number" min="1" class="form-control" name="" id="" placeholder="A000000001" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 mt-3">
                        <button type="button" class="btn btn-close" data-dismiss="modal">Mbyll</button>
                        <button type="button" class="btn btn-save-edit pt-lg-1 pt-md-0">Perditso Ndryshimet</button>
                    </div>
                </div>
            </div>
        </div>
<script>

</script>




<?php  
}else{
 echo "<script>window.location.href='stoku'</script>";
  } 
} ?>