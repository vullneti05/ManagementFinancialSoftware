<html>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,400i,500,600,700,800&display=swap" rel="stylesheet">



    <!-- Date Css -->
    <link rel="stylesheet" href="Views/assets/css/datepicker.css">
   <link href="Views/assets/css/main.css" rel="stylesheet">
    <link href="Views/assets/css/responsive.css" rel="stylesheet">
    <link href="node_modules/sweetalert2/dist/sweetalert2.css" rel="stylesheet">
    <script src="Views/assets/js/jquery.min.js"></script>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </head>
  <div class="d-flex" id="wrapper">
  <?php include("sidebar.php")?>
  <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <img src="Views/assets/images/Icon-ios-menu.png" alt="" id="menu-toggle">
        <div class="navbar-nav ml-auto">
          <div class="d-flex">
            <button type="button" class="btn btn-primary btnn custom-drop" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
         <!--    <span class="message-custom float-right">
              </span> -->
            <i class="far fa-bell icon-custom-color"></i>
            </button>
            <div class="card ml-3">
              <div class="card-body">
                <div class="d-flex">
                
                 <span class="ml-4 mr-4 cus-span2">
                  <?php echo $_SESSION['kasieri']; ?>
                    
                  </span>
                <img src='Views/assets/images/shfrytezuesit/<?php echo $_SESSION['image']; ?>' height="38px" width="60px" alt="">
                  
                  <div class="btn-group">
                    <button type="button" class="text-white bg-transparent border-0 dropdown-toggle-split ml-3 custom-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-chevron-down i-res"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item d-flex" href="logout">
                        <img src="Views/assets/images/Icon open-account-login@2x.png" alt="">
                        <p class="ml-2">Log out</p>
                      </a>
                      <a class="dropdown-item d-flex" href="#">
                        <img src="Views/assets/images/Icon material-account-balance-wallett@2x.png" alt="">
                        <p class="ml-2">Mbyll arken</p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!-- Navigation -->
      <div class="row custom-navigation">
        <div class="col-lg-12">
          <div class="collapse multi-collapse" id="multiCollapseExample1">
            <div class="card">
              <ul class="list-group">
                <div class="list-group-item list-group-item-action custom-remove">
                 <?php
$veshtrimifaturavepasive = new furnizimiModels();
  $a = Connection::dbconnect()->prepare("SELECT * FROM regjistrimimallit_tbl");
  $a->execute();
  foreach($a as $malli){
    $sasiaminimale1 = $malli['sasiaminimale'];
    $x1 =0;
    $y1 =0;
    $count = 0;    
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
    $stz = 0;
    if( $_SESSION['z'] <=$sasiaminimale1){
      $stz = $stz+1;
   
      echo ' NJOFTIM ! per momentin keni vetem '. $_SESSION['z'] .' '.$malli['emriproduktit'].'a ju lutemi  furnizohuni me '.$malli['emriproduktit'].'a !<br>';
       }else{
        echo "";
       }
   }
   $test = Connection::dbconnect()->prepare("SELECT * FROM regjistrimimallit_tbl WHERE sasiaminimale > '".$_SESSION['z']."'");
      $test->execute();
    
if($test->rowCount() <= 0){
  echo $_SESSION['z'] = "Stoku ne rregull";
}else{
  $test->fetchAll();
}

          
  ?>
                </div>
              </ul>
            </div>
          </div>
        </div>
      </div>