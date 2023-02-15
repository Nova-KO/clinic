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

<?php include 'theme/userheader.php'; ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="homepage.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usercheck_up.php">
            <i class="fas fa-fw fa-wheelchair"></i>
            <span>Profile</span></a>
        </li>
        <li class="nav-item active">
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

            <div id="content-wrapper">

        <div class="container-fluid">
 
 <h2>List of Your Check-up(s)</h2>
 <div class="row">
            <div class="col-lg-8">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-bar"></i>
                </div>
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
                       <th>Details</th>
                    </tr>
                  </thead>
              <?php

$query = 'SELECT c.check_id,c.patient_id,CONCAT(p.fname," ",p.lname) AS "PATIENT NAME" ,c.complains,c.findings,c.date,c.status FROM patients p,check_up c where p.patient_id=c.patient_id and findings = "N/A" and p.patient_id = "'.$_SESSION['get'].'"';
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
                                 echo '<td> <a  type="button" class="btn btn-lg btn-warning fas fa-user-check" href="userdetails.php?action=post & id='.$row['check_id'] . '"></a> ';
                            echo '</tr> ';
                }
            ?> 
                </table>
              </div>
            <canvas id="myBarChart" width="100%" height="50"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-pie"></i>
                  ADD CHECK-UP</div>
                  <?php
$query = "SELECT patient_id, concat(patient_id,'-',fname,\" \",lname) FROM patients where patient_id ='".$_SESSION["get"]."'";

$result = mysqli_query($db,$query);
?>

                  <form role="form" method="post" action="usertransacc.php?action=add"> 
                  <div class="form-group">
                              <a>Patient Name:</a>
                              <select  name="pid" class="form-control">
                              <?php while($row = mysqli_fetch_array($result)):; ?>
                              <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Complains" name="c" required>
                            </div> 
                            <div class="form-group">
                               <input class="form-control" placeholder="Date" name="date" type="date" required >
                            </div>  
                            <center>
                            <button type="submit" class="btn btn-default">Save Record</button>
                            <button type="reset" class="btn btn-default" style="background-color: red">Clear Entry</button>
                            </center>
                  </form>
                  <br>
                </div>
           <?php include 'theme/userfooter.php'; ?>