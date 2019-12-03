<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="">

                        <form method="POST" action="">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control usr" name="databaza" placeholder="emribiznesit">

                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="Aktivizo Databazen" class="btn float-right login_btn">
                            </div>
                   
                        </form>
                </div>

            </div>
        </div>

    </div>
</body>

</html>

<style>
    /* Made with love by Mutiullah Samim*/
    
    @import url('https://fonts.googleapis.com/css?family=Numans');
    html,
    body {
        background-image: url('Views/assets/images/bgmfs.png');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }
    
    .container {
        height: 100%;
        align-content: center;
    }
    
    .card {
        height: 370px;
        margin-top: auto;
        margin-bottom: auto;
        width: 400px;
        background-color: rgba(0, 0, 0, 0.5) !important;
    }
    
    .social_icon span {
        font-size: 60px;
        margin-left: 10px;
        color: #FFC312;
    }
    
    .social_icon span:hover {
        color: white;
        cursor: pointer;
    }
    
    .social_icon {
        position: absolute;
        right: 20px;
        top: -45px;
    }
    
    .input-group-prepend span {
        width: 50px;
        background-color: #FFC312;
        color: black;
        border: 0 !important;
        margin-top: 100px;
    }
    
    .usr {
        margin-top: 100px;
    }
    
    input:focus {
        outline: 0 0 0 0 !important;
        box-shadow: 0 0 0 0 !important;
    }
    
    .remember {
        color: white;
    }
    
    .remember input {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
    }
    
    .login_btn {
        color: black;
        background-color: #FFC312;
        width: 360px;
    }
    
    .login_btn:hover {
        color: black;
        background-color: white;
    }
    
    .links {
        color: white;
    }
    
    .links a {
        margin-left: 4px;
    }
</style>


<?php

// if(isset($_POST['databaza'])){

// $kontrollodatabazen = new administrataModels();

// $kontrollodatabazen->kontrollodatabazen();
// foreach($kontrollodatabazen->kontrollodatabazen() as $test){

//     $_SESSION['databaza'] = $test['databaza'];
//     $_SESSION['pronari']  = $test['kompania'];

//     header("Location: /mfs-soft");


// $thirredatabazen = new administrataModels();
// $thirredatabazen->shfaqdbt();


// }




  if(isset($_POST['databaza'])){

    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['databaza'])){

      $databaza = $_POST['databaza'];

      $tedhenat = administrataModels::krahasodatabazen($databaza);

      if($tedhenat["kompania"] == $databaza ){

          $_SESSION['nerregull']  = "gjithqkanerregull";
          $_SESSION['dbja']       = $tedhenat["databaza"];
          $_SESSION['skadenca']   = $tedhenat['dataskadences'];
          $_SESSION['statusi']    = $tedhenat['statusi'];
             echo  "<br> <div class='alert alert-danger' style='background-color:#bb0000;color:white;text-align:center'>Ky Biznes nuk egziston</div>";   
         ?>
    <script>
        window.location.href = "../mfs-soft";
    </script>
    <?php
    
      }else{
    echo $_SESSION['dbja'];
        echo  "<br> <div class='alert alert-danger' style='background-color:#bb0000;color:white;text-align:center'>Ky Biznes nuk egziston</div>";   
      }
    }
    if($_POST['databaza']==""){

    echo"<br> <div class='alert alert-danger' style='background-color:#bb0000;color:white;text-align:center;'> Shkruani emrin e Biznesit tuaj </div>";   

    }

  }



// var_dump($_SESSION['pronari']);
// var_dump($_SESSION['databaza']);

























?>