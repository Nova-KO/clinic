<?php 
include "includes/connection.php";
include "theme/header.php";
if(!$_SESSION["active"]){
 header("Location: login.php");
}
else if($_SESSION["status"]!=='ADMIN') {
header("Location: login.php");
}
else
{
?>

    <div id="wrapper">

       <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item active">
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
      <?php
}
      ?>


            <div id="content-wrapper">

        <div class="container-fluid">
<link rel="stylesheet" href="css/pic.css" type="text/css">
 <!--  <div class="frame1">
            <div class="box">
              <img src="img/Screenshot_2018-09-17-09-46-19_1.jpg" alt="Img" height="130" width="197">
            </div>
          </div> -->
<!--  <div>Patients Table</div> -->
 <h2>List of Patient(s)            <a href="addpatient.php?action=add" type="button" class="btn btn-xs btn-info">Add New</a></h2> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Patient type</th>
                      <th>Age</th>
                      <th>Address</th>
                      <th>Option</th>
                      <th>Details</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT * FROM patients';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['patient_id'].'</td>';
                             echo '<td>'. $row['fname'].'</td>';
                              echo '<td>'. $row['lname'].'</td>';
                               echo '<td>'. $row['patient_type'].'</td>';
                                echo '<td>'. $row['age'].'</td>';
                                 echo '<td>'. $row['address'].'</td>';
                            echo '<td> <a  type="button" class="btn btn-xs btn-warning" href="editp.php?action=edit & id='.$row['patient_id'] . '"> EDIT </a></td> ';
                            echo '<td> <a  type="button" class="btn btn-lg btn-warning fas fa-user-check" href="detailspatients.php?action=post & id='.$row['patient_id'] . '"></a> ';
                            echo '</tr></td> ';
                }
            ?> 
                </table>
              </div>
              </div>
           <?php 
           include 'theme/footer.php'; ?>