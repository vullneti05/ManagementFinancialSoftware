<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,600,700&display=swap" rel="stylesheet">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
		<script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
		<script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
		<link href="Views/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="Views/assets/css/main.css" rel="stylesheet">
		<link href="Views/assets/css/lightslider.css" rel="stylesheet">
		<link href="Views/assets/css/responsive.css" rel="stylesheet">
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</head>
	<body class="bg-green">
		<div id="header-front">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="card h-100" id="slider-container">
							<div class="custom-card">
								<h5 class="text-center mt-5 mb-5">How it Works</h5>
								<div id="slider-2"  class="carousel slide carousel-fade" data-ride="carousel">
									<div class="slidecontainer">
										<div class="carousel-indicators" id="">
											<li data-target="#slider-2" data-slide-to="1" class="active"></li>
											<li data-target="#slider-2" data-slide-to="2"></li>
											<li data-target="#slider-2" data-slide-to="3"></li>
											<li data-target="#slider-2" data-slide-to="4"></li>
											<li data-target="#slider-2" data-slide-to="5"></li>
										</div>
									</div>
									<div class="carousel-inner" role="listbox">
										<div class="carousel-item active">
											<div class="view">
												<img class="d-block w-50 mb-5" height="300px" src="Views/assets/images/Group1.png"
												alt="First slide">

												<div class="mask rgba-black-light"></div>
											</div>
											<div class="text-center mb-5 custom-text-header">
												<h5 class="h3-responsive">Startimi i arkes</h5>
												<p class="pl-4">Startimi i arkes ne menyre automatike bën llogaritjen e shumes në arkë nga ndrrimi i kaluar.Kontroll e detaizuar e arkes pas gjdo ndrrimi dhe pas perfundimit te dites</p>
											</div>
											<p class="text-center"><span id="">1</span>/5</p>
										</div>
										<div class="carousel-item">
											<div class="view">
												<img class="d-block w-50 mb-5" height="300px" src="Views/assets/images/Group2.png"
												alt="First slide">
												<div class="mask rgba-black-light"></div>
											</div>
											<div class="text-center mb-5 custom-text-header">
												<h5 class="h3-responsive">Regjistrimi I mallit te ri</h5>
												<p>Regjisitrimi I mallit  regjistrimi I faturave I detajuar me qmim te blerjes si dhe me qmim te
												shitjes sasia minimale si dhe paralajmrim per munges te produktit te caktuar</p>
											</div>
											<p class="text-center"><span id="">2</span>/5</p>
										</div>
										<div class="carousel-item">
											<div class="view">
												<img class="d-block w-50 mb-5" height="300px" src="Views/assets/images/Group3.png"
												alt="First slide">
												<div class="mask rgba-black-light"></div>
											</div>
											<div class="text-center mb-5 custom-text-header">
												<h5 class="h3-responsive">Printimi I barcodit</h5>
												<p class="custom-p-margin">Printimi I barcodit per gjdo product ne menyr automatike si dhe printimi I te gjithe stokut dhe I shtijeve</p>
											</div>
											<p class="text-center"><span id="">3</span>/5</p>
										</div>
										<div class="carousel-item">
											<div class="view">
												<img class="d-block w-50 mb-5" height="300px" src="Views/assets/images/Group4.png"
												alt="First slide">
												<div class="mask rgba-black-light"></div>
											</div>
											<div class="text-center mb-5 custom-text-header">
												<h5 class="h3-responsive">Stoku</h5>
												<p class="custom-p-margin">Menaxhim te stokut dhe informata te sakta per sasin e stokut nga largesia
												</p>
											</div>
											<p class="text-center"><span id="">4</span>/5</p>
										</div>
										<div class="carousel-item">
											<div class="view">
												<img class="d-block w-50 mb-5" height="300px" src="Views/assets/images/Group5.png"
												alt="First slide">
												<div class="mask rgba-black-light"></div>
											</div>
											<div class="text-center mb-5 custom-text-header">
												<h5 class="h3-responsive">Statistika</h5>
												<p class="custom-p-margin">Statistiak ne kohe reale te arkes te shitjeve ditore deri ne ate moment si dhe statistika vjetore dhe krahasime mes muajve</p>
											</div>
											<p class="text-center"><span id="">5</span>/5</p>
										</div>
									</div>
									<a class="carousel-control-next h-25 mt-auto mb-auto" href="#slider-2" role="button" data-slide="next">
										<img src="Views/assets/images/Icon-arrow-right-circle.png" alt="">
									</a>
									<a class="carousel-control-prev h-25 mt-auto mb-auto" href="#slider-2" role="button" data-slide="prev">
										<img src="Views/assets/images/Icon-arrow-left-circle.png" alt="">
									</a>
								</div>
							</div>
							<div id="custom-arrow-header">
								<img src="Views/assets/images/arrow.png" alt="">
							</div>
							
						</div>
					</div>

			
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="card h-100 border-bottom">
							<div class="card-body">
								<div class="sidebar-heading text-center">

									<span class=" text-success">MF</span>
									<span class="logo-custom1" >soft<span class="text-success">.</span></span>
									<p class="">Menagment financiar software</p>

									<p>aktivizo databazen <a href="emridb">


										<b>ketu</b></a></p>
									<?php
	?>
								</div>
								<div class="custom-card-login">
									<div class="form-group">
										  <div class="alert alert-danger d-none" id="incorrect" style="text-align: center;">Pseudonimi ose Fjalekalimi  eshte Gabim !</div>
										  	  <div class="alert alert-success d-none" id="oncorrect" style="text-align: center;">Pseudonimi ose Fjalekalimi  jane te sakta !</div>
									<label for="">Pseudonimi</label>
										<input type="text" class="form-control" placeholder="Pseudonimi" name="" id="loginpseudonimi" oninput="checkInput()">
									</div>
									<div class="form-group">
										<label for="">Fjalkalimi</label>
										<input type="password" class="form-control" placeholder="Fjalekalimi" name="" id="loginfjalkalimi" oninput="checkInput()">
									</div>
									<div class="form-group ml-3">



				<?php
									if(isset($_SESSION['dbja'])){
									 $emripronarit = $_SESSION['dbja'];


								    

								       $afatiskaduar = new administrataModels();

								      
								      $row = $afatiskaduar->iskaduar($emripronarit);
								      $statusi='';
								      foreach($row as $test){
								      	$statusi = $test['statusi'];
								      }
											if($statusi =="pasiv"){
 													echo "<h6 style='color:#bb0000;text-align:center;'>ABONIMI JUAJ KA SKADUAR </h6>";
 													echo "<p style='color:#bb0000;text-align:center;'>Kontaktoni administratorin per RIABONIM .</p>";
 													
 												}else{


											?>
										<button class="btn custom-btn-login" id="login" onclick="login()" disabled>Kyquni</button>

									<?php } 	}else{
										echo "DATABAZA JUAJ NUK ESHTE AKTIVIZUAR";

									}?>

							

									</div>
								</div>
							</div>
							<a href="https://www.otreks.com" target="_blank">
								
							</a>
						</div>
					</div>





				</div>
			</div>
		</div>
  <script type="text/javascript">
   var loginpseudonimi = document.getElementById("loginpseudonimi");
   var loginfjalkalimi = document.getElementById("loginfjalkalimi");
   var button = document.getElementById("login");
   function checkInput() {
      if (loginpseudonimi.value !== "" && loginfjalkalimi.value !== "") {
         button.disabled = false;
      } else {
         button.style.backgroundColor = 'bg-green';
         button.disabled = true;
      }
   }
function login(){
      var loginpseudonimi = $("#loginpseudonimi").val();
      var loginfjalkalimi = $("#loginfjalkalimi").val();
      $.ajax({
         url: 'Controllers/login.php',
         method: "post",
         data: {
            loginpseudonimi: loginpseudonimi,
            loginfjalkalimi: loginfjalkalimi
         },
         success: function(results) {
         	
            if (results == 0) {
               $("#incorrect").removeClass('d-none');
            }if(results == 1){
            	window.location.href="startimi-arkes";
            }
         }
      });
   }
</script>