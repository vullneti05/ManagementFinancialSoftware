<?php 
$arrayAutorizim = explode(" ",$_SESSION['autorizimi']); 
foreach($arrayAutorizim as $row1){ 

if(strpos($row1,"klient")!==false) { 
?>
    <section id="startimi-arkes">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <span class="font-weight-bold ml-3">Startimi i arkes</span>
                    <div class="card">
                        <div class="card-body">
                            <p class="text-success">Nderrimi paradites</p>

                            <div class="form-group d-flex mt-5">
                                <input type="text" name="" value="<?php echo $_SESSION['pseudonimi'];?>" class="d-none" id="puntori">
                                <label for="" class="mt-4 ml-5 mr-auto float-left">Data</label>
                                <div class="mt-4 input-group mr-5">
                                    <input type="text" class="form-control wu-input border-gray" date="datepicker" id="data" placeholder="Filtro me date">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label for="" class="mt-4 ml-5 mr-auto float-left">Shuma e startimit</label>
                                <div class="mt-3 input-group mr-5">
                                    <input type="number" min="1" class="form-control" aria-label="" id="shuma">
                                </div>
                            </div>
                            <div class="form-group d-flex">
                                <label for="" class="mt-4 ml-5 mr-auto float-left">Koment</label>
                                <div class="mt-3 input-group mr-5">
                                    <textarea class="form-control border-0" rows="3" id="komenti"></textarea>
                                </div>
                            </div>
                            <button class="btn float-right w-50 mr-5" onclick="startoarken()">Starto</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 

?>

        <?php  
	}else{
		header("Location:../mfs-soft");
	  } 
	} 
?>