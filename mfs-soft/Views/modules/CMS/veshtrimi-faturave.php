<section id="furnizimi">
    <div class="conatiner">
        <div class="row">
            <div class="col-lg-10 col-md-12">
                <div class="d-flex">
                    <div class="input-group">
                        <input type="search" class="form-control  custom-search searchInput" placeholder="Kerko me numer te Faktures ose Date" name="nrfaktures" id="nrfaktures" oninput="nrfaktures()">
                    </div>
                </div>
                <div class="card mt-3 custom-card cos-borgj">
                    <div class="card-body p-4">
                        <a href="furnizimi" class="float-right custom-x">
                            <img src="Views/assets/images/Icon feather-x-circle.png" alt="">
                        </a>
                        <p class="font-weight-bold mt-1">Veshtrimi i faturave</p>
                        <div class="custom-table-scroll-vf ">
                            <table class="table" id="printTable">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Shifra e fatures</th>
                                        <th>Numri i artikjve</th>
                                        <th>Vlera blerese</th>
                                        <th>Vlera shitese</th>

                                        <th>Data ( Y-M-D )</th>

                                        <th id="option-th">Opcione</th>
                                    </tr>
                                </thead>
                                <tbody id="veshtrimifaturave">
                                    <?php 
										$veshtrimifaturavepasive = new furnizimiModels();
										$veshtrimifaturavepasive->shfaqfaturatembyllura();

										$count = 0;
										foreach($veshtrimifaturavepasive->shfaqfaturatembyllura() as $faturapasive){
											$count = $count+1;

											$blerja = $faturapasive['qmimiblerjes']*$faturapasive['sasia'];
											$shitja = $faturapasive['qmimishitjes']*$faturapasive['sasia'];

												 $blerja * $faturapasive['sasia'];
												 $shitja * $faturapasive['sasia'];

											echo '
													<tr>

													<td>'.$count.'</td>
													<td>'.$faturapasive['shifrafatures'].'</td>
													<td>'.$faturapasive['sasia'].'</td>
													<td>'.$blerja.' €</td>
													<td>'.$shitja.' €</td>

													<td>'.$faturapasive['koha'].'</td>

													<td>
													<a href="furnizimi?veshtrimi='.$faturapasive['shifrafatures'].'">
													<i class="far fa-eye ml-2 custom-eye" ></i>
													</a>

													<a href="" >
													<i class="far fa-times-circle custom-delete ml-2" onclick="fshifurniziminpasiv('.$faturapasive['id_furnizimi'].')"></i>
													</a>
													</td>
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
            <div class="col-lg-2 col-md-12 d-lg-inline d-md-flex custom-veshtrimi-faturave">
                <div class="">
                    <a href="#" class="btn is">
                        <p class="mt-3">Veshtrimi i faturave</p>
                    </a>
                </div>
                <div class="">
                    <a href="" class="btn custom-printo d-flex" onclick="printDatas();">
                        <img src="Views/assets/images/Icon feather-printer.png" class="mt-0 ml-3" alt="">
                        <p class="ml-3 mt-0">Printo</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function ndryshofaturenpasive(test) {
        alert(test);
    }
</script>