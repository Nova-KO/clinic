<?php
include "includes/connection.php";
session_start();
if(!$_SESSION["active"]){
 header("Location: login.php");
}
else if($_SESSION["status"]=='ADMIN') {
header("Location: login.php");
}
else
{
?>
<?php
}
?>

<?php include 'theme/userheader.php'; ?>
    <div id="wrapper">

       <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
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
        <li class="nav-item active">
          <a class="nav-link" href="userongoing.php">
            <i class="fas fa-fw fa-question"></i>
            <span>Completed Check-up</span></a>
        </li>
        </ul>
      </ul>

            <div id="content-wrapper">

        <div class="container-fluid">
 
 <h2>List of Complete Check-up(s)</h2>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Patients Id</th>
                      <th>Patients Name</th>
                      <th>Complains</th>
                      <th>Findings</th>
                       <th>Date</th>
                       <th>Status</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT c.check_id,c.patient_id,CONCAT(p.fname," ",p.lname) AS "PATIENT NAME" ,c.complains,c.findings,c.date,c.status FROM patients p,check_up c where p.patient_id=c.patient_id and status != "ONGOING" and p.patient_id = "'.$_SESSION['get'].'"';
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['check_id'].'</td>';
                            echo '<td>'. $row['patient_id'].'</td>';
                             echo '<td>'. $row['PATIENT NAME'].'</td>';
                              echo '<td>'. $row['complains'].'</td>';
                               echo '<td>'. $row['findings'].'</td>';
                                 echo '<td>'. $row['date'].'</td>';
                                  echo '<td>'. $row['status'].'</td>';
                            echo '</tr> ';
                }
            ?> 
                </table>
              </div>
            </div>
            <?php include 'theme/footer.php'; ?>
