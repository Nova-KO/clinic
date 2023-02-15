<?php
include "includes/connection.php";
session_start();
if(!isset($_SESSION["userf"])){
 header("Location: login.php");
}else if($_SESSION["status"]=='ADMIN') {
header("Location: login.php");
}
else
{
?>
<?php
}
?>

<?php include 'theme/userheader.php'; 
?>
<div id="wrapper">

       <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="homepage.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item active">
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
<link rel="stylesheet" href="css/pic.css" type="text/css">
 <h2>List of Your Record(s)</h2> 
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
                    </tr>
                  </thead>
              <?php

$query = 'SELECT * FROM patients where patient_id = "'.$_SESSION['get'].'"';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['patient_id'].'</td>';
                             echo '<td>'. $row['fname'].'</td>';
                              echo '<td>'. $row['lname'].'</td>';
                               echo '<td>'. $row['patient_type'].'</td>';
                                echo '<td>'. $row['age'].'</td>';
                                 echo '<td>'. $row['address'].'</td>';
                                 echo '<td> <a  type="button" class="btn btn-lg btn-warning fas fa-user-check" href="detailsuser.php?action=post & id='.$row['patient_id'] . '"></a> ';
                            echo '</tr> ';
                }
            ?> 
                </table>
              </div>
             </div>
          <?php include 'theme/userfooter.php'; ?>
