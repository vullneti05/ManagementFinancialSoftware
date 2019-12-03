<?php 
$attributes = $_SESSION['autorizimi'];
$arrayAutorizim = explode(" ,",$attributes); 
foreach($arrayAutorizim as $row1){ 

if(strpos($row1,"furnizimi")!==false) { 
?>
    <section id="furnizimi">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-10 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="font-weight-bold mb-5">Furnizim i ri</p>
                            <form method="POST" action="">

                                <?php
										if(isset($_GET['veshtrimi'])){
										$veshtrimi = $_GET['veshtrimi'] ;
										$shifraefaturesembyllurid = new furnizimiModels();

										$shifraefaturesembyllurid->shfaqfaturatembyllurameid($veshtrimi);

										foreach($shifraefaturesembyllurid->shfaqfaturatembyllurameid($veshtrimi) as $shifraid){
												$shifraefaturesid  = $shifraid['shifrafatures'];
												$shifraefatures    = $shifraid['shifrafatures'];
												$emrifurnitorit    = $shifraid['emrifurnitorit'];
												$data  			   = $shifraid['koha'];
											echo '

							<div class="d-lg-flex mb-4 mt-4">
								<div class="col-lg-4 col-md-12">
									<div class="form-group">';

									?>
                                    <label for="">Emertimi i mallit</label>
                                    <select class="form-control" id="emertimimallit">
                                        <option value="">Selekto Mallin</option>
                                        <?php
												$emertimimallit = new regjistrimimallitModels();
												$emertimimallit->shfaqmallin();
												foreach($emertimimallit->shfaqmallin() as $emrimallit){
												$malli = $emrimallit['emriproduktit'];
												$idmallit = $emrimallit['id'];
											?>
                                            <option name="emrimallit" value="<?php echo $malli;?>" id="emertimimallit1">
                                                <?php echo $malli; ?>
                                            </option>

                                            <?php }?>
                                    </select>
                                    <?php echo '
									</div>
									<div class="form-group">
										<label for="">Qmimi i blerjes</label>
										<input type="number" min="1" class="form-control" name="qmimiblerjes" id="qmimiblerjes1" placeholder="Qmimi i blerjes" >
									</div>
									<div class="form-group">
										<label for="">Qmimi i shitjes</label>
										<input type="number" class="form-control" name="qmimishitjes" id="qmimishitjes1" placeholder="Qmimi i shitjes">
									</div>

								</div>
								<div class="col-lg-4 mt-lg-0 mt-md-4 col-md-12">
									<div class="form-group">
										<label for="">Sasia</label>
										<input type="number" min="1" class="form-control" name="sasia" id="sasia1" placeholder="Sasia">
									</div>			
									<div class="form-group">
										<label for="">Shifra fatures</label>
										<input type="text" min="1" class="form-control"  name="shifrafatures" id="shifrafatures1" value='.$shifraid['shifrafatures'].' disabled="" placeholder='.$shifraid['shifrafatures'].'>

									</div>
									<div class="form-group">
										<label for="">Emri i furnitorit</label>
										<input type="text" min="1" class="form-control" name="emrifurnitorit" id="emrifurnitorit1"  placeholder="'.$shifraid['emrifurnitorit'].'" value="'.$shifraid['emrifurnitorit'].'"  disabled="">
									</div>
								</div>
								<div class="col-lg-4 col-md-12 mt-lg-0 mt-md-4">
									<div class="form-group">
										<label for="">Data</label>
								<input type="text" class="form-control wu-input border-gray" name="koha" id="koha1" value="'.$shifraid['koha'].'"  disabled="" placeholder='.$shifraid['koha'].'>
									</div>
								<input type="button" class="btn custom-btn mt-3 w-100" onclick="furnizimimephp()" value="Shto ne Fature"/>
								</div>		

								</form>
											';

										}	
									}else{

									?>
                                        <div class="d-lg-flex mb-4 mt-4">
                                            <div class="col-lg-4 col-md-12">
                                                <div class="form-group">
                                                    <label for="">Emertimi i mallit</label>
                                                    <select class="form-control" id="emertimimallit">
                                                        <option value="">Selekto Mallin</option>
                                                        <?php
												$emertimimallit = new regjistrimimallitModels();
												$emertimimallit->shfaqmallin();
												foreach($emertimimallit->shfaqmallin() as $emrimallit){
												$malli = $emrimallit['emriproduktit'];
												$idmallit = $emrimallit['id'];
											?>
                                                            <option value="<?php echo $malli;?>" id="emrimallit">
                                                                <?php echo $malli; ?>
                                                            </option>

                                                            <?php }?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Qmimi i blerjes</label>
                                                    <input type="number" min="1" class="form-control" name="" id="qmimiblerjes" placeholder="Qmimi i blerjes">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Qmimi i shitjes</label>
                                                    <input type="number" class="form-control" name="" id="qmimishitjes" placeholder="Qmimi i shitjes">
                                                </div>

                                            </div>
                                            <div class="col-lg-4 mt-lg-0 mt-md-4 col-md-12">
                                                <div class="form-group">
                                                    <label for="">Sasia</label>
                                                    <input type="number" min="1" class="form-control" name="" id="sasia" placeholder="Sasia">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Shifra fatures</label>
                                                    <input type="text" min="1" class="form-control" name="" id="shifrafatures" placeholder="Shifra fatures">

                                                </div>
                                                <div class="form-group">
                                                    <label for="">Emri i furnitorit</label>
                                                    <input type="text" min="1" class="form-control" name="" id="emrifurnitorit" placeholder="Emri i furnitorit">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 mt-lg-0 mt-md-4">
                                                <div class="form-group">
                                                    <label for="">Data</label>
                                                    <input type="date" class="form-control wu-input border-gray" id="koha">
                                                </div>
                                                <input type="button" class="btn custom-btn mt-3 w-100" onclick="furnizimiri();" value="Shto ne Fature" />
                                            </div>

                                            <?php }

									?>

                                        </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-2 mt-1">
                    <div class="">
                        <a href="veshtrimi-faturave" class="btn">
                            <p class="mt-3">Veshtrimi i faturave</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mt-5">
                    <div class="card custom-card">
                        <div class="card-body">
                            <p class="font-weight-bold">Furnzim i ri </p>
                            <div class="cus-btn-furnizimi float-right">
                                <input type="text" name="" value="pasiv" id="pasiv" class="d-none">
                                <button class="btn" onclick="mbyllfaturen()">Mbyll faturen</button>
                            </div>

                            <form action="">
                                <div class="form-group d-flex ml-1">
                                    <!-- 	<input type="text" class="form-control w-25 custom-search" placeholder="Search" name="search"> -->

                                    <input type="search" class="form-control w-25 custom-search" placeholder="Kerko mallin e Furnizuar" name="searchfurnizim" id="searchfurnizim" oninput="kerko()">
                                    <i class="fa fa-search icon-search"></i>
                                </div>
                            </form>
                            <div class="custom-table-scroll">
                                <table class="table col-md-table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Emri i produkti</th>
                                            <th>Qmimi blerjes </th>
                                            <th>Qmimi i shitjes</th>
                                            <th>Sasia</th>
                                            <th>Vlera Blerse</th>
                                            <th>Vlera shitese</th>

                                            <th>Opcione</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelaefurnizimit">

                                    </tbody>
                                    <?php
								if(isset($_GET['veshtrimi'])){

									$veshtrimi = $_GET['veshtrimi'] ;
									$ndryshofurnizimin= new furnizimiModels();
									$ndryshofurnizimin->veshtro($veshtrimi);
									$c = 0;
									foreach($ndryshofurnizimin->veshtro($veshtrimi) as $key=>$faturataktive){
										$vlerablerese = $faturataktive['qmimiblerjes'] * $faturataktive['sasia'];
										$vlerashitese = $faturataktive['qmimishitjes'] * $faturataktive['sasia'];

									$c = $c+1;
									 echo '
										<tbody id="veshtroid">
									 <tr>
											<td>'.$c.'</td>
											<td id="emri">'.$faturataktive['emriproduktit_fk'].'</td>
											<td id="qmimiblerjes">'.$faturataktive['qmimiblerjes'].' €</td>
											<td id="qmimishitjes">'.$faturataktive['qmimishitjes'].' €</td>
											<td id="sasia">'.$faturataktive['sasia'].'</td>
											<td >'.$vlerablerese.' €</td>
											<td >'.$vlerashitese.' €</td>

											<td>
												<a href="" data-toggle="modal" data-target="#exampleModal">
													<i class="far fa-edit ml-2 text-primary" onclick="ndryshofurniziminaktiv('.$faturataktive['id_furnizimi'].')"></i>
												</a>
											</td>
										</tr>

										</tbody>
										';

									}

							?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Information -->
        <div class="modal fade custom-modal-edit" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <p class="modal-title" id="custom-modal-Cash">Lexo kuponat ditore</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <img src="Views/assets/images/Icon-black-x-circle.png" alt="">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 mt-5">
                                    <div class="form-group">
                                        <input type="text" class="d-none" id="editfurnizimiaktiv">
                                        <label for="">Emri Produktit</label>
                                        <input type="text" class="form-control " id="editemriproduktitaktiv">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Qmimi blerjes</label>
                                        <input type="number" min="1" class="form-control" id="editqmimiblerjesaktiv">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-5">
                                    <div class="form-group">
                                        <label for="">Qmimi i shitjes</label>
                                        <input type="number" min="1" class="form-control" id="editqmimishitjesaktiv">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Sasia</label>
                                        <input type="number" min="1" class="form-control" id="editsasiaaktiv">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-5">
                                    <div class="form-group">
                                        <?php 

									?>
                                            <label for="">Vlera Blerse</label>
                                            <input type="text" class="form-control" id="editvlerablerjes" disabled="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vlera shitese</label>
                                        <input type="text" class="form-control" id="editvlerashitjes" disabled="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-close" data-dismiss="modal">Mbyll</button>

                        <?php if(isset($_GET['veshtrimi'])){
						echo '	<button type="button" class="btn btn-save-edit" id="perditsoveshtrim" onclick="perditsoveshtrimin()" >Perditso Ndryshimet2</button>';
					}else{
						echo '<button type="button" class="btn btn-save-edit" id="perditsoveshtrim" onclick="perditsonfurniziminaktiv()" >Perditso Ndryshimet</button>';
					}
					?>
                            <?php 
					}else{

					}?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php  

}else{
 echo "<script>window.location.href='stoku'</script>";
  } 
} ?>