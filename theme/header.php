<?php include 'includes/connection.php'; ?>
<?php
  // $url=$_SERVER['REQUEST_URI'];
  // header("Refresh: 10; URL=$url");
?>
<?php
session_start();

if(!$_SESSION["active"]){
 header("Location: login.php");
}
else if($_SESSION["status"]!=='ADMIN') {
header("Location: login.php");
}
if(isset($_SESSION['active'])){
  echo '<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Clinic Management System</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Online Clinic Management System</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            </button>
          </div>
        </div>
      </form>
     <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1" style="color:green">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw">
            '
      ;?>
      <?php
           

               $query = "SELECT * FROM notification";
               $result = mysqli_query($db,$query);
               $count = 0;
                while($row = mysqli_fetch_array($result)){
                  $count++;
                }

            echo '<br>'.'    '.'
            <span class="badge badge-danger">';?><?php echo $count;?><?php echo'</span>
            </i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">';?>

<?php 

                                $query2 = "SELECT * FROM notification order by not_id LIMIT 8";
                                $count2= 0;
                                $result2 = mysqli_query($db,$query2);
                              ?>
                              <?php while($row2 = mysqli_fetch_array($result2)):; 
                                $_SESSION['p']=$row2[1];
                                  
                                echo '
            <a class="dropdown-item" href="notification.php">';?><?php echo $row2[2]; echo ' ' . 'added on check up </a>';?>

          <?php  endwhile;
          echo '
          </li>
            </ul>
            <div style="color:green">';?>

<?php
             
               echo " ".$_SESSION["active"]." ".$_SESSION["active2"]; 
       echo '
       </div>
      <!-- Navbar -->
      
            <a class="fas fa-sign-out-alt fa-fw" href="logout.php" data-toggle="modal" data-target="#logoutModal" style="color:white"></a>
      
       </nav>';

  }else{
    echo '<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Clinic Management System</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Online Clinic Management System</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          </div>
        </div>
      </form>

      <!-- Navbar -->
    </nav>';
  }
?>