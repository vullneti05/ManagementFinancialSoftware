 <?php 
$attributes = $_SESSION['autorizimi'];
$arrayAutorizim = explode(" ",$attributes); 
foreach($arrayAutorizim as $row1){ 
if(strpos($row1,"shfrytezues")!==false) { 
?> 

<section id="shfrytezuesit">
	<div class="container-fluid">
		<div class="card w-100">
			<div class="card-body">
				<p>Shfrytezues i ri</p>
				<div class="row">
					<div class="col-lg-4 col-md-6 pl-5 mt-5">
						<div class="form-group w-75">
							<label for="">Emri & Mbiemri</label>
			<!-- 				emri	pseudonimi	fjalkalimi	image	autorizimi	 -->

							<input type="text" class="form-control" name="" id="emri">
						</div>
						<div class="form-group w-75">
							<label for="">Pseudonimi</label>
							<input type="text" class="form-control" name="" id="pseudonimi">
						</div>
						<div class="form-group w-75">
							<label for="">Fjalkalimi</label>
							<input type="password" class="form-control" name="" id="fjalkalimi">
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mt-5">

						<div class="form-group w-75">
							<label for="" class="d-block">Fotografi</label>
			

							<div class="custom-file" required>
							<input type="file" id="image" name="file" class="custom-file-input form-control" onchange="loadFile(event)">
							<label for="image" class="custom-file-label col-form-label">Choose file</label>

							</div>

							<label for="">Autorizimi</label>
							<div class="custom-control custom-checkbox mt-3">
			<input type="checkbox" name="type" value="klient" checked="" class="d-none">
			<input type="checkbox" class="custom-control-input" id="shitje-sh"  name="type" value="shitje">
								<label class="custom-control-label " for="shitje-sh">Shitje</label>
							</div>
							<div class="custom-control custom-checkbox mt-3">
		<input type="checkbox" class="custom-control-input" id="furnizimi-sh"  name="type" value="furnizimi">
								<label class="custom-control-label " for="furnizimi-sh">Furnizimi</label>
							</div>
							<div class="custom-control custom-checkbox mt-3">
								<input type="checkbox" class="custom-control-input" id="statistika-sh"  name="type" value="statistika">
								<label class="custom-control-label " for="statistika-sh">Statistika</label>
							</div>
								<div class="custom-control custom-checkbox mt-3">
								<input type="checkbox" class="custom-control-input" id="shfrytezues-sh"  name="type" value="shfrytezues">
								<label class="custom-control-label " for="shfrytezues-sh">Shfrytezues</label>
							</div>

						</div>
					</div>
					<div class="col-lg-4 col-md-6 ml-lg-0 ml-md-4 mt-5">
						<div class="form-group">
													<div class="row">
							<img src="Views/assets/images/shfrytezuesit/user.png" id="output" class="foto img-fluid  col-5"  />
							<input type="hidden"id="file" name="file" class="is" >
							</div>
						</div>
						<div class="form-group">
							<button class="btn" onclick="ruaje()">Ruaje</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-10">
			<div class="card mt-5 custom-card-shfrytezuesit">
				<div class="card-body">
					<p class="font-weight-bold mt-2 ml-1 custom-p-shfrytezuesit">Shfrytezuesit</p>
					<div class="custom-table-scroll">
						<table class="table bg-white">
							<thead>
								<tr>
									<th>ID</th>
									<th>Emri & Mbiemri</th>
									<th>Username</th>
									<th>Password</th>
									<th>Autorizimet</th>
									<th>Foto</th>
									<th>Opcione</th>
								</tr>
							</thead>
							<tbody id="shfaqshfrutzuesit">

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade custom-modal-edit" id="custom-modal-sh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
							<div class="col-lg-4 col-md-12 ml-md-0 mt-lg-5">
								<input type="text" name="" id="editid" class="d-none">
								<div class="form-group w-75">
									<label for="">Emri & Mbiemri</label>
									<input type="text" class="form-control" name="" id="editemri">
								</div>
								<div class="form-group w-75">
									<label for="">Username</label>
									<input type="text" class="form-control" name="" id="editpseudonimi">
								</div>
								<div class="form-group w-75">
									<label for="">Password</label>
									<input type="password" class="form-control" name="" id="editfjalkalimi" placeholder="" required="">
								</div>
							</div>
							


							<div class="col-lg-4 col-md-12 ml-md-0 mt-lg-5">						
							<label for="" class="d-block mb-3">Fotografi</label>
								                    <div class="custom-file" required>
                    <div class="custom-file" required>
                      <input type="file" id="editadminimage" name="editadminimage" class="custom-file-input  form-control "  onchange="UploadImage(event)" >
                      <label for="image" class="custom-file-label col-form-label">Choose file</label>

                    </div>
                    </div>
								<div class="form-group w-75">

						<div class="custom-control custom-checkbox mt-3">
						<input type="checkbox" name="edittype" id="klient-sh" value="klient" checked="" class="d-none">

						<input type="checkbox" class="custom-control-input" id="editshitje-sh"  name="edittype" value="shitje">
								<label class="custom-control-label " for="editshitje-sh">shitje</label>

							</div>
							<div class="custom-control custom-checkbox mt-3">
								<input type="checkbox" class="custom-control-input" id="editfurnizimi-sh"  name="edittype" value="furnizimi">
								<label class="custom-control-label " for="editfurnizimi-sh">Furnizimi</label>
							</div>
							<div class="custom-control custom-checkbox mt-3">
								<input type="checkbox" class="custom-control-input" id="editstatistika-sh"  name="edittype" value="statistika">
								<label class="custom-control-label " for="editstatistika-sh">Statistika</label>
							</div>
								<div class="custom-control custom-checkbox mt-3">
								<input type="checkbox" class="custom-control-input" id="editshfrytezues-sh"  name="edittype" value="shfrytezues">
								<label class="custom-control-label " for="editshfrytezues-sh">Shfryzues</label>
							</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-12 ml-md-0 mt-lg-5">
						<div class="form-group">
		<!-- 				<div class="row">
							<img src="Views/assets/images/shfrytezuesit/user.png" id="output2" class="foto img-fluid  col-5"  />
							<input type="hidden"id="file" name="file" class="is" >
							</div> -->
						</div>




							<div class="form-group">
							<div class="row">
							<img src="" id="output2" class="foto shfaqfotoneselektuar" width="75%" height="50%" />
							<input type="hidden" id="image"  class="is  "/  >

							</div>
							</div>

							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer border-0">
					<button type="button" class="btn btn-close" data-dismiss="modal">Mbyll</button>
					<button  class="btn btn-save-edit pt-lg-1 pt-md-0" onclick="perditesoshfrytezuesin()">Perditso Ndryshimet</button>
				</div>
			</div>
		</div>
	</section>

<?php  
  
}else{
 echo "<script>window.location.href='stoku'</script>";
  } 
} ?> 