<section id="stoku">
    <div class="conatiner">
        <div class="row">
            <div class="col-lg-10 col-md-12">
                <div class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Filtro me artikull" aria-label="" id="stokusearch" name="stokusearch" onkeyup="stokusearch()">
                    </div>
                </div>
                <div class="card mt-3 custom-card custom-card-stoku">
                    <div class="card-body p-4">
                        <p class="font-weight-bold text-white mt-1">Veshtrimi i faturave</p>
                        <div class="custom-table-scroll-vf ">
                            <table class="table" cellpadding="5" id="printTable">
                                <thead>
                                    <tr>
                                        <th>Barkodi</th>
                                        <th>Artikulli</th>
                                        <th>Data e fundit e furnizimit</th>
                                        <th>Ne depo</th>
                                        <th>Qmimi</th>
                                        <th colspan="2">Vlera per shitje</th>
                                        <th colspan="2">Vlera ne shitje</th>
                                        <th id="option-th" class="d-none"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 

$veshtrimifaturavepasive = new furnizimiModels();
	$a = Connection::dbconnect()->prepare("SELECT * FROM regjistrimimallit_tbl");
	$a->execute();
	$count = 0;
	foreach($a as $malli){
		$x1 =0;
		$y1 =0;

		$x = Connection::dbconnect()->prepare("SELECT koha , sum(sasia) AS sasiaefurnizimit , koha , qmimiblerjes , qmimishitjes FROM furnizimi_tbl WHERE emriproduktit_fk = '".$malli['emriproduktit']."'");
		$x->execute();
		$row = $x->fetchAll();

		foreach($row as $j){
			$x1 = $j['sasiaefurnizimit'];
			$koha = $j['koha'];
			$qmimiblerjes = $j['qmimiblerjes'];
			$qmimishitjes = $j['qmimishitjes'];

		}

		$y = Connection::dbconnect()->prepare("SELECT sum(sasia) AS sasiaeshitjes FROM shitjet_tbl WHERE emri = '".$malli['emriproduktit']."'");
		$y->execute();
		$row2 = $y->fetchAll();

		foreach($row2  as $j){
			$y1 = $j['sasiaeshitjes'];
		}
		$_SESSION['z'] =  $x1-$y1;

		$c = $_SESSION['z'] *$qmimiblerjes;
		$q =$_SESSION['z'] *$qmimishitjes;

		$count = $count+$c;

		echo '<tr>
				<td>'.$malli['barkodi'].'</td>
				<td>'.$malli['emriproduktit'].'</td>
				<td>'.$koha.'</td>
				<td>'.$_SESSION['z'].'</td>
				<td>'.$qmimiblerjes.'</td>
				<td colspan="2">'.$c.'</td>
				<td colspan="2">'.$q.'</td>
				<td class="options d-none"></td>

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
            <div class="col-lg-2 col-md-12 d-lg-inline d-md-flex">
                <div class="mt-5">
                    <div href="#" class="btn custom-btn-stoku">
                        <span class="mt-3">Vlera per shitje e stokut</span>
                        <p class="custom-fatura">
                            <?php echo $count;?>
                        </p>
                    </div>
                </div>
                <div class="cus-res-btn">
                    <a href="" class="btn custom-printo d-flex" onclick="printDatas();">
                        <img src="Views/assets/images/Icon feather-printer.png" class="mt-1 ml-3" alt="">
                        <p class="ml-3 mt-2">Printo</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>