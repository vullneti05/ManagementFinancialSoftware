<?php
	if(!isset($_GET['biznesi'])){
?>
    <script>
        window.location.href = 'administrata';
    </script>
    <?php		
}
?>
        <section id="administrata">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mt-5">
                        <div class="card custom-card-b">
                            <div class="card-body">
                                <div class="row">
                                    <p class="mr-auto mt-1 ml-3"></p>
                                    <a href="bizneset">
                                        <img src="Views/assets/images/Icon ionic-ios-close-circle-outline.png" alt="">
                                    </a>
                                </div>

                                <?php 

						if(isset($_GET['biznesi'])){

						$biznesi = $_GET['biznesi'];

						$biznesimeid = new administrataModels();

							$kompania 	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['kompania'];
							$qyteti	 	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['qyteti'];
							$adresa	 	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['adresa'];
							$nrbiznesit	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['nrbiznesit'];
							$nrfiskal	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['nrfiskal'];
							$pronari	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['pronari'];
							$nrtelefoni	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['nrtelefoni'];
							$statusi	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['statusi'];
							$nrartikujve 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['nrartikujve'];
							$linku	 	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['linku'];
							$databaza	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['databaza'];
							$qmimi	 	 	=  $biznesimeid->shfaqbiznesinmeid($biznesi)['qmimi'];
							$dataskadences  = $biznesimeid->shfaqbiznesinmeid($biznesi)['dataskadences'];
						// foreach( as $biznesi){
						// 	echo $biznesi['kompania'];
						// }
					}
						?>
                                    <div class="row custom-row-biznes">

                                        <div class="col-lg-4 col-md-12 mt-3">
                                            <div class="form-group">
                                                <label for="">Emri i kompanis</label>
                                                <input type="text" class="form-control" name="" id="" disabled value="<?php echo $kompania;?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Qyteti</label>
                                                <select class="form-control" disabled>
                                                    <option>
                                                        <?php echo $qyteti ?>
                                                    </option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Adresa</label>
                                                <input type="text" class="form-control" name="" id="" disabled value="<?php echo$adresa ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nr.Biznesit</label>
                                                <input type="number" min="1" class="form-control" name="" id="" disabled value="<?php echo$nrbiznesit ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nr.Fiskal</label>
                                                <input type="number" min="1" class="form-control" name="" id="" disabled value="<?php echo$nrfiskal ?>">
                                            </div>

                                        </div>
                                        <div class="col-lg-4 col-md-12 mt-3">
                                            <div class="form-group">
                                                <label for="">Emri dhe mbiemri i pronarit</label>
                                                <input type="text" class="form-control" name="" id="" disabled value="<?php echo$pronari ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nr.Telefonit </label>
                                                <input type="number" min="1" class="form-control" name="" id="" disabled value="<?php echo$nrtelefoni ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Data Skadences</label>
                                                <input type="text" class="form-control wu-input border-gray" id="date" placeholder="Filtro me date" disabled value="<?php echo $dataskadences ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Statusi</label>
                                                <select class="form-control" disabled>
                                                    <option value="">
                                                        <?php echo $statusi ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nr.Artikujve</label>
                                                <input type="number" min="1" class="form-control" name="" id="" disabled value="<?php echo $nrartikujve; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mt-3">
                                            <div class="form-group">
                                                <label for="">Linku</label>
                                                <input type="text" class="form-control" name="" id="" disabled value="<?php echo $linku ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">DataBaza</label>
                                                <select class="form-control" disabled>
                                                    <option value="">
                                                        <?php echo $databaza;?>
                                                    </option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Qmimi</label>
                                                <input type="number" min="1" class="form-control" name="" id="" disabled value="<?php echo$qmimi ?>">
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12" style="margin-top: -22px;">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="form-group d-flex ml-1">
                                    <p class="mr-auto mt-3">Database</p>
                                    <input type="text" class="form-control mt-2 w-25 custom-search" placeholder="Search" name="search">
                                    <i class="fa fa-search icon-search"></i>
                                </div>
                                <div class="custom-table-scroll">
                                    <table class="table bg-white">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Data Autoriziimit</th>
                                                <th>Data Skadences</th>
                                                <th>Shuma e paguar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
									$shfaqpagesat = new administrataModels();

									$shfaqpagesat->shfaqpagesat($biznesi);
									$count = 0;
									foreach ($shfaqpagesat->shfaqpagesat($biznesi) as $pagesat) {
										$count = $count+1;
									echo '
											<tr>
												<td >'.$count.'</td>
												<td >'.$pagesat['koha'].'</td>
												<td >'.$pagesat['dataskadimit_pageses'].'</td>
												<td >'.$pagesat['qmimi_pageses'].' Euro</td>
											</tr>

									';
									}

									?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 mt-4">
                        <div class="card ml-md-0 ml-lg-0">
                            <div class="card-body">
                                <p>Aktivizimi i Databazes</p>
                                <div class="form-group mt-5">
                                    <label for="">Data skadences</label>
                                    <input type="text" class="form-control wu-input border-gray" date="datepicker" id="dataskadences" placeholder="Filtro me date">
                                </div>
                                <div class="form-group mt-5">
                                    <label for="">Pagesa</label>
                                    <input type="number" min="1" class="form-control" name="" id="pagesa">
                                    <input type="number" min="1" class="form-control d-none" value="<?php echo $biznesi ?>" id="afatizobiznes">
                                </div>
                            </div>
                            <button class="btn" onclick="afatizobiznesin()">Autorizo</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade custom-modal-edit" id="custom-modal-a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <p class="modal-title" id="custom-modal-Cash">Perditeso te Dhenat</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <img src="Views/assets/images/Icon-black-x-circle.png" alt="">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 mt-5">
                                        <div class="form-group w-75">
                                            <label for="">Emri i Databazes</label>
                                            <input type="text" class="form-control" name="" id="">
                                        </div>

                                    </div>
                                    <div class="col-md-4 mt-5">
                                        <div class="form-group w-75">
                                            <label for="">Koha e autorizimit</label>
                                            <input type="text" class="form-control" name="" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-5">
                                        <div class="form-group">
                                            <label for="">Tipi i Databazes</label>
                                            <select class="form-control">
                                                <option>Small select</option>
                                                <option>Small select</option>
                                                <option>Small </option>
                                                <option>Small </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-close" data-dismiss="modal">Mbyll</button>
                            <button type="button" class="btn btn-save-edit">Perditso Ndryshimet</button>
                        </div>
                    </div>
                </div>
        </section>

        <script>
            function afatizobiznesin() {
                var afatizobiznes = $("#afatizobiznes").val();
                var dataskadences = $("#dataskadences").val();
                var pagesa = $("#pagesa").val();

                var aktivizim = new FormData();

                aktivizim.append('afatizobiznes', afatizobiznes);
                aktivizim.append('dataskadences', dataskadences);
                aktivizim.append('pagesa', pagesa);

                if (afatizobiznes != "" && dataskadences != "" && pagesa != "") {

                    $.ajax({
                        url: 'Controllers/administrataController.php',
                        cache: false,
                        contentType: false,
                        processData: false,

                        data: aktivizim,
                        afatizobiznes: afatizobiznes,
                        dataskadences: dataskadences,
                        pagesa: pagesa,
                        dataType: "text",
                        type: "post",

                        success: function(rezultatet) {
                            alert("ju keni riabonuar sherbimin");

                            $("#dataskadences").val("");
                            $("#pagesa").val("");

                        }
                    });
                } else {
                    alert("te  gjitha fushat jane te obliguara");
                }

            }
        </script>