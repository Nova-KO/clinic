<?php include 'includes/connection.php'; ?>
<?php
session_start();
if(!isset($_SESSION["userf"])){
 header("Location: login.php");
}else if($_SESSION["status"]=='ADMIN') {
header("Location: login.php");
}
else if(isset($_SESSION['userf'])){
  echo '<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Clinic System</title>

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

      <a class="navbar-brand mr-1" href="homepage.php">Online Clinic System</a>

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
      <li class="nav-item dropdown no-arrow" style="color:green">'?>
<?php
             
               echo " ".$_SESSION["userf"]." ".$_SESSION["userl"]; 
       echo '</li>
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
            <a class="fas fa-sign-out-alt fa-fw" href="logout.php" data-toggle="modal" data-target="#logoutModal" style="color:white"></a>
            </ul>
       </nav>';
        include 'theme/userfooter.php'; 
        
     }else if($_SESSION["active"]=='jude'){
     header("location: login.php");
  }else if(!isset($_POST['userf'])){
    echo '<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Clinic System</title>

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

      <a class="navbar-brand mr-1" href="index.php">Online Clinic System</a>

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
      <ul class="navbar-nav ml-auto ml-md-0">
        <a class="fas fa-sign-in-alt fa-fw active" href="login.php" style="color:white">
        </a>
      </ul>

    </nav>';
  }
?>
<?php
 if(isset($_SESSION['userf'])){
  echo '
  <div id="wrapper">

       <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="homepage.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usercheck_up.php">
            <i class="fas fa-fw fa-wheelchair"></i>
            <span>Profile</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userpatients.php">
            <i class="fas fa-fw fa-check"></i>
            <span>Check-up</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="userongoing.php">
            <i class="fas fa-fw fa-question"></i>
            <span>Completed Check-up</span></a>
        </li>
        </ul>
      </ul>


            <div id="content-wrapper">

        <div class="container-fluid">

';
}else if($_SESSION["active"]=='jude'){
     header("location: login.php");
} else if(!isset($_POST['userf'])){
  echo '
  <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        </ul>
        <div id="content-wrapper">

        <div class="container-fluid">';
}
 ?>

   <!--  <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="patients.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Patients</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="check_up.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Check-up</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="medicines.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Medicines</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="treatments.php">
            <i class<div id="wrapper">

      -- Sidebar --
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
          ="fas fa-fw fa-table"></i>
            <span>Treatments</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="equipments.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Equipments</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>List of Registered</span></a>
        </li>
      </ul>

            <div id="content-wrapper">

        <div class="container-fluid">}
 -->
 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">CLIENT</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
          <div style="background-image: url(img/head.jpg);height: 340px;width: 1113px"></div>
          <br>