<section id="administrata">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="form-group d-flex ml-1">

                            <input type="text" class="form-control mt-2 w-25 custom-search" placeholder="Search" name="search">
                            <i class="fa fa-search icon-search"></i>
                        </div>
                        <div class="custom-table-scroll">
                            <table class="table bg-white">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Emri i Databazes</th>
                                        <th>Tipi i Databazes</th>
                                        <th>Koha e autorizimit</th>
                                        <th>Opcione</th>
                                    </tr>
                                </thead>
                                <tbody id="biznesDB">
                                    <?php
										$shfaqdatabazat = new administrataModels();
										$shfaqdatabazat->aktivizobizneset();
										$i = 0;
										foreach($shfaqdatabazat->aktivizobizneset() as $aktivizo){
										$i++;
									?>
                              <tr>
                                  <td>
                                      <?php echo $i ;?>
                                  </td>
                                  <td>
                                      <?php echo $aktivizo['emridatabazes'];?>
                                  </td>
                                  <td>
                                      <?php echo $aktivizo['tipidatabazes'];?>
                                  </td>
                                  <td>
                                      <?php echo $aktivizo['koha'];?>
                                  </td>
                                  <td>

                                                <i class="far fa-times-circle custom-delete ml-2" onclick="deletedb(<?php echo $aktivizo['id']?>)"></i>

                                                <a href="#">
										<i  class="fa fa-edit custom-edit ml-2" data-toggle="modal" data-target="#exampleModal" onclick="editdbname(<?php echo $aktivizo['id']?>)" >
  										</i>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Emri i databazes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <input type="text" name="dbname" class="form-control" id="dbname">
       <input type="text" name="dbname" class="form-control d-none" id="idedbs">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbyll </button>
        <button type="button" class="btn btn-primary" onclick="ndryshodb()">Ndrysho Emrin</button>
      </div>
    </div>
  </div>
</div>
			<div class="col-lg-3 col-md-12 mt-5">
				<div class="card ml-md-0 ml-lg-0">
					<div class="card-body">
						<p>Aktivizimi i Databazes</p>
						<div class="form-group mt-5">
							<label for="">Emri i databazes</label>
							<input type="text" class="form-control"  id="emridatabazes">
							<input type="text" class="form-control d-none"  id="idedbs">
						</div>
						<div class="form-group">
							<label for="">Tipi i Databazes</label>
							<select class="form-control" id="tipidatabazes">
								<option value="">Cakto tipin e Databazes</option>
								<option value="Shitore" >Shitore</option>
								<option value="Restaurant">Restaurant</option>
							</select>
						</div>

					</div>
					<button class="btn" onclick="aktivizo()">Aktivizo</button>	
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
							<div class="col-lg-4 col-md-12 mt-5">
								<div class="form-group w-75">
									<label for="">Emri i Databazes</label>
									<input type="text" class="form-control" name="" id="">
								</div>

							</div>
							<div class="col-lg-4 col-md-12 mt-5">
								<div class="form-group w-75">
									<label for="">Koha e autorizimit</label>
									<input type="text" class="form-control" name="" id="">
								</div>
							</div>
							<div class="col-lg-4 col-md-12 mt-5">
								<div class="form-group" >
										<label for="">Tipi i Databazes</label>
										<select class="form-control" id="">
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
					<button type="button" class="btn btn-close" data-dismiss="modal" >Mbyll</button>
					<button type="button" class="btn btn-save-edit pt-lg-1 pt-md-0">Perditso Ndryshimet</button>
				</div>
			</div>
		</div>
</section>
<script>
function editdbname(editdb){

var editdb = editdb;

    data = new FormData();
    data.append("editdb" , editdb);
    $.ajax({
        url: 'Controllers/edit.php',
        method: "POST",
        data: data,
        editdb:editdb,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(resultatet){
        	console.log(resultatet)	

        	$("#idedbs").val(resultatet['id']);
        	$("#dbname").val(resultatet["emridatabazes"]);
        }
    });

}
function ndryshodb(){

    var dbname = $("#dbname").val();
    var idedbs = $("#idedbs").val();

    var ndrysho_emrin_e_DBs = new FormData();       

    ndrysho_emrin_e_DBs.append('dbname' , dbname);  
    ndrysho_emrin_e_DBs.append('idedbs' , idedbs);  

    if(dbname !="" ){

    $.ajax({
        url: "Controllers/administrataController.php",
        type: "POST",
        data: ndrysho_emrin_e_DBs,
        contentType: false,
        processData: false,
        cache:false,
        dataType: "text",
        success: function(results){
        	 window.location.href="administrata";

        }
    });

 }else{
     alert("*ploteso fushen Emri i Databases");
 }
}
function deletedb(deleteid){

	$.ajax({
	  type: 'GET',
	  url: 'Controllers/administrataController.php',
	  data: { 
	        'deleteid': deleteid 
	        },
	  success: function(results) {  
	 	alert("Ju keni fshir Databazen dhe Biznesin me Sukses");
	  setTimeout(function() {
	   location.reload();
	  }, 100);
	} 
	});
}

function aktivizo(){

var emridatabazes = $("#emridatabazes").val();
var tipidatabazes = $("#tipidatabazes").val();

  var test  = new FormData();  

  test.append('emridatabazes' , emridatabazes);
  test.append('tipidatabazes' , tipidatabazes);

    if(emridatabazes !="" && tipidatabazes !=""){

    $.ajax({
        url: 'Controllers/administrataController.php', 
        cache         : false         ,
        contentType   : false         ,
        processData   : false         ,
        data          : test          ,
        emridatabazes : emridatabazes , 
        tipidatabazes : tipidatabazes , 
        dataType      : "text"        ,                  
        type          : "post"        ,

      success: function(rezultatet){  

       window.location.href='administrata';
          alert("Ju keni Shtuar databazen me emrin: DB_"+emridatabazes+ "  Kategoria: "+tipidatabazes+"");
        } 
     });

    }else{
      alert("*mbushini te gjitha fushat");

      // $("#errormall").removeClass("d-none");
      // $("#deletemall").addClass("d-none");
      // $("#updatemall").addClass("d-none");
    }
}

</script>