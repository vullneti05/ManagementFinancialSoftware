<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,400i,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Date Css -->
    <link rel="stylesheet" href="Views/assets/css/datepicker.css">
    <!-- End CSS -->
    <link href="Views/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="Views/assets/css/main.css" rel="stylesheet">
    <link href="Views/assets/css/responsive.css" rel="stylesheet">
  </head>
  <div class="d-flex" id="wrapper">
    <?php include("sidebar.php")?>
    <div id="page-content-wrapper" >
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="menu-toggle-menu"></div>
        <img src="Views/assets/images/Icon-ios-menu.png" alt="" id="menu-toggle">
        <div class="navbar-nav ml-auto">
          <div class="d-flex">
            <div class="card ml-3">
              <div class="card-body">
                <div class="d-flex">
                  <span class="ml-4 mr-4 cus-span2"><?php echo $_SESSION['user']?></span>
                  <img src="Views/assets/images/user.png" height="38px" width="60px" alt="">
                  <div class="btn-group">
                    <button type="button" class="text-white bg-transparent border-0 dropdown-toggle-split ml-3 custom-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <img src="Views/assets/images/toogle.png" alt="">
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item d-flex mt-4" href="logoutadm">
                        <img src="Views/assets/images/Icon open-account-login@2x.png" alt="">
                        <p class="ml-2">Log out</p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>