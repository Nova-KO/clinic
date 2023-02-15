<?php include 'includes/connection.php'; ?>
<?php
//session_start();

if(!$_SESSION["active"]){
 header("Location: login.php");
}
else if($_SESSION["status"]!=='ADMIN') {
header("Location: login.php");
}
if(isset($_SESSION['active'])){
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
        <li class="nav-item">
          <a class="nav-link" href="patients.php">
            <i class="fas fa-fw fa-wheelchair"></i>
            <span>Patients</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="check_up.php">
            <i class="fas fa-fw fa-check"></i>
            <span>Completed Check-up</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ongoing.php">
            <i class="fas fa-fw fa-question"></i>
            <span>Ongoing Check-up</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="medicines.php">
            <i class="fas fa-fw fa-briefcase-medical"></i>
            <span>Medicines</span></a>
        </li>

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
       <li class="nav-item">
          <a class="nav-link" href="checkdetails.php">
            <i class="fas fa-fw fa-database"></i>
            <span>Check-up Details</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="equipments.php">
            <i class="fas fa-fw fa-toolbox"></i>
            <span>Equipments</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list.php">
            <i class="fas fa-fw fa-users"></i>
            <span>List of Registered</span></a>
        </li>
      </ul>
      </ul>


            <div id="content-wrapper">

        <div class="container-fluid">

';
} else{
  echo '
  <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
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