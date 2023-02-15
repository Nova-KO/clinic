<?php
if(isset($_SESSION['userf'])){
  echo '
  <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userpatients.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Patients</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usercheck_up.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Check-up</span></a>
        </li>
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