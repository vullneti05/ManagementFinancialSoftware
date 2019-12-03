<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Administrator Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">

                <div class="card-body">

                    <form method="POST" action="">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control usr" name="user" id="user" placeholder="admin">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control usr" name="password" id="password" placeholder="password">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="adminlogin" value="Kyquni" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>

<style>
    /* Made with love by OTREKS L.L.C Team  www.otreks.com */
    
    @import url('https://fonts.googleapis.com/css?family=Numans');
    html,
    body {
        background-image: url('Views/assets/images/bg1.jpg');
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

  if(isset($_POST['adminlogin'])){

    if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['user']) &&
       preg_match('/^[a-zA-Z0-9]+$/', $_POST['password'])){

      $user = $_POST['user'];
      $password = $_POST['password'];
      $tedhenat = administrataModels::krahasoadminin($user, $password);

      if($tedhenat["user"] == $_POST['user']  && $tedhenat["password"] == $_POST['password']){

          $_SESSION['administratori']   = "adminmeqasje";
          $_SESSION['user']   = $tedhenat["user"];

         if(isset($_SESSION['administratori']) && $_SESSION['administratori'] == "adminmeqasje") {

         ?>
    <script>
        window.location.href = "administrata";
    </script>
    <?php

         }

      }else{
         echo "<br> <div class='alert alert-danger' style='background-color:#bb0000;color:white;width:250px;'> Username and Password are Invalid </div>";   
      }
    }
    if($_POST['user']=="" && $_POST['password'] == ""){

      echo "<br> <div class='alert alert-danger' style='background-color:#bb0000;color:white;width:250px;'> Username and Password are Required </div>";   

    }

  }

?>