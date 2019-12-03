<section id="fletore">
    <div class="container-fluid">
        <nav>
            <div class="nav nav-pills border-0 nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                <a class="custom-btn-post mr-md-3 mr-lg-3 col-sm-6  col-lg-3 col-md-5" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                    <span class="float-left mt-1">Post</span>
                    <i class="fas fa-mail-bulk mt-2 ml-3"></i>
                    <?php 
					$numriidergesavemeposte = new postaModels();
					$numriidergesavemeposte->tegjithadergesatmeposte();
					foreach($numriidergesavemeposte->tegjithadergesatmeposte() as $tegjithameposte){
						echo '<span class="custom-pagesa float-right" >'.$tegjithameposte[0].'</span>';
					}
					?>
                </a>
                <a class=" custom-btn-borgj mr-md-0 mr-lg-3 col-lg-3 col-md-5" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                    <span class="float-left mt-1">Borgj</span>
                    <i class="fas fa-money-check mt-2 ml-3"></i>
                    <?php 
					$numriiborgjeve = new borgjiModels();
					$numriiborgjeve->tegjithaborgjet();
					foreach($numriiborgjeve->tegjithaborgjet() as $tegjithaborgjet){
						echo '<span class="custom-pagesa float-right" >'.$tegjithaborgjet[0].'</span>';
					}
					?>
                </a>
                <a class=" custom-btn-cash mr-md-1 col-lg-3 col-md-5" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                    <span class="float-left mt-1">Cash</span>
                    <i class="fas fa-hand-holding-usd mt-2 ml-3"></i>
                    <?php 
					$numriicashit = new cashModels();
					$numriicashit->tegjithacash();
					foreach($numriicashit->tegjithacash() as $cash){
						echo '<span class="custom-pagesa float-right" id="cashload">'.$cash[0].'</span>';
					}
					?>
                </a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="col-md-12">
                    <div class="row">
                        <div class="card custom-card">
                            <div class="card-body">
                                <i class="fas fa-mail-bulk mt-2 ml-3 text-white"></i>
                                <div class="float-right">
                                    <button type="button" class="btn custom-btn" data-toggle="modal" data-target=".bd-example-modal-lg">Te pa paguara</button>
                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <span>Dergimi me Poste - Te paguarat</span>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Emri & Mbiemri</th>
                                                            <th>Adresa</th>
                                                            <th>Nr.Telefoni</th>
                                                            <th>Shuma</th>
                                                            <th>Koment</th>
                                                            <th>Fshi</th>
                                                            <th>e paguar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
											$results = new postaModels();
											foreach($results->shfaqpostetepaguara() as $tepaguarat){

											?>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>
                                                                    <?php echo $tepaguarat['emri'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $tepaguarat['adresa'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $tepaguarat['telefoni'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $tepaguarat['qmimi'];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $tepaguarat['mesazhi'];?>
                                                                </td>
                                                                <td>

                                                                    <i class="far fa-times-circle ml-2" onclick="deleteblerjenmeposte(<?php echo $tepaguarat['idposta'] ?>)"></i>
                                                                </td>
                                                                <td class="custom-td">
                                                                    <img src="Views/assets/images/icon-check2.png" id="img" alt="">
                                                                </td>
                                                            </tr>
                                                            <?php	
											} 
										?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mt-5 custom-card border-0">
                                        <div class="card-body">
                                            <div class="custom-table-scroll1">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Emri & Mbiemri</th>
                                                            <th>Adresa</th>
                                                            <th>Nr.Telefoni</th>
                                                            <th>Shuma</th>
                                                            <th>Koment</th>
                                                            <th colspan="2">Opcione</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="shfaqposte">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="col-md-12">
                    <div class="row">
                        <div class="custom-card cos-borgj">
                            <div class="card-body">
                                <i class="fas fa-money-check mt-2 ml-3 text-white"></i>
                                <div class="float-right">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
                                        Te Paguarat
                                    </button>

                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Borgjet e Paguara</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <span>Borgjet - Te paguarat</span>
                                                    <table class="table table-borgj">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Emri & Mbiemri</th>
                                                                <th>Adresa</th>
                                                                <th>Nr.Telefoni</th>
                                                                <th>Shuma</th>
                                                                <th>statusi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
											$results = new borgjiModels();
											foreach($results->shfaqborgjetepaguara() as $borgjetepaguarat){

											?>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <?php echo $borgjetepaguarat['emri'];?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $borgjetepaguarat['adresa'];?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $borgjetepaguarat['telefoni'];?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $borgjetepaguarat['qmimi'];?>
                                                                    </td>

                                                                    <td class="custom-td">
                                                                        <img src="Views/assets/images/icon-check2.png" id="img" alt="">
                                                                    </td>
                                                                </tr>
                                                                <?php	
											} 
										?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- 			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card mt-5 custom-card border-0 cos-borgj">
                                        <div class="card-body">
                                            <div class="custom-table-scroll1">
                                                <table class="table table-borgj">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Emri & Mbiemri</th>
                                                            <th>Adresa</th>
                                                            <th>Nr.Telefoni</th>
                                                            <th>Shuma</th>
                                                            <th>Koment</th>
                                                            <th colspan="2">Opcione</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="shfaqborgjet">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="col-md-12">
                    <div class="row">
                        <div class="card custom-card cos-cash">
                            <div class="card-body">
                                <i class="fas fa-hand-holding-usd mt-2 ml-3 text-white"></i>
                                <div class="float-right">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                        Te Paguarat
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Cash te Paguara</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <span>CASH-at  e paguara</span>
                                                    <table class="table table-cash">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Emri & Mbiemri</th>
                                                                <th>Adresa</th>
                                                                <th>Nr.Telefoni</th>
                                                                <th>Shuma</th>
                                                                <th>statusi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
											$results = new cashModels();
											foreach($results->shfaqcashtepaguara() as $cashepaguar){

											?>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>
                                                                        <?php echo $cashepaguar['emri'];?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $cashepaguar['adresa'];?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $cashepaguar['telefoni'];?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $cashepaguar['qmimi'];?>
                                                                    </td>

                                                                    <td class="custom-td">
                                                                        <img src="Views/assets/images/icon-check2.png" id="img" alt="">
                                                                    </td>
                                                                </tr>
                                                                <?php	
											} 
										?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbyll</button>
                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card mt-5 custom-card border-0 cos-cash">
                                        <div class="card-body">
                                            <div class="custom-table-scroll1">
                                                <table class="table table-cash">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Emri & Mbiemri</th>
                                                            <th>Adresa</th>
                                                            <th>Nr.Telefoni</th>
                                                            <th>Shuma</th>
                                                            <th>Koment</th>
                                                            <th colspan="2">Opcione</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="shfaqcash">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade custom-modal-edit" id="post-furnizimi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <p class="modal-title" id="custom-modal-Cash">Ndrysho te dhenat</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="Views/assets/images/Icon-black-x-circle.png" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <input type="text" name="" id="perditesoidposta" class="d-none">
                                    <label for="">Emri & Mbiemri</label>
                                    <input type="text" class="form-control" name="" id="perditesoemri">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Adresa</label>
                                    <input type="text" class="form-control" name="" id="perditesoadresa">
                                </div>
                            </div>
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <label for="">Nr.Telefoni</label>
                                    <input type="number" min="1" class="form-control" name="" id="perditesotelefoni">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Shuma</label>
                                    <input type="number" min="1" class="form-control" name="" id="perditesoqmimi">
                                </div>
                            </div>
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <label for="">Koment</label>
                                    <input type="text" class="form-control" name="" id="perditesomesazhi">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 mt-3">
                    <button type="button" class="btn btn-close" data-dismiss="modal">Mbyll</button>
                    <button type="button" class="btn btn-save-edit" onclick="perditesoposten()">Perditso Ndryshimet</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade custom-modal-edit" id="borgj-furnizimi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <p class="modal-title" id="custom-modal-Cash">Ndrysho te dhenat</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="Views/assets/images/Icon-black-x-circle.png" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <input type="text" name="" id="perditesoidborgji" class="d-none">
                                    <label for="">Emri Produktit</label>
                                    <input type="text" class="form-control" name="" id="perditesoemriproduktitborgj">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Adresa</label>
                                    <input type="text" class="form-control" name="" id="perditesoadresaborgj">
                                </div>
                            </div>
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <label for="">Nr.Telefoni</label>
                                    <input type="number" min="1" class="form-control" name="" id="perditesotelefoniborgj">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">shuma</label>
                                    <input type="number" min="1" class="form-control" name="" id="perditesoshumaborgj">
                                </div>

                            </div>
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <label for="">mesazhi</label>
                                    <input type="text" class="form-control" name="" id="perditesomesazhiborgj">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 mt-3">
                    <button type="button" class="btn btn-close" data-dismiss="modal">Mbyll</button>
                    <button type="button" class="btn btn-save-edit" onclick="perditesoborgjin()">Perditso Ndryshimet</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    <div class="modal fade custom-modal-edit" id="cash-furnizimi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <p class="modal-title" id="custom-modal-Cash">Ndrysho te dhenat</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="Views/assets/images/Icon-black-x-circle.png" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <input type="text" name="" id="perditesoidcash" class="d-none">
                                    <label for="">Emri Produktit</label>
                                    <input type="text" class="form-control" name="" id="perditesoemriproduktitcash">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Adresa</label>
                                    <input type="text" class="form-control" name="" id="perditesoadresacash">
                                </div>
                            </div>
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <label for="">Nr.Telefoni</label>
                                    <input type="number" min="1" class="form-control" name="" id="perditesotelefonicash">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">shuma</label>
                                    <input type="number" min="1" class="form-control" name="" id="perditesoshumacash">
                                </div>

                            </div>
                            <div class="col-md-4 mt-5">
                                <div class="form-group">
                                    <label for="">mesazhi</label>
                                    <input type="text" class="form-control" name="" id="perditesomesazhicash">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 mt-3">
                    <button type="button" class="btn btn-close" data-dismiss="modal">Mbyll</button>
                    <button type="button" class="btn btn-save-edit" onclick="perditesocash()">Perditso Ndryshimet</button>
                </div>
            </div>
        </div>
    </div>
</section>