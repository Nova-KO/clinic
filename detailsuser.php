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
      <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Patient Details</div>
        <div class="card-body">
                    
                              

                                    

                                     <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT * FROM patients WHERE patient_id = '".$id."'";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                           
                                                          
                                                            ?>
                                    

                                    <tr>
                                                <td align="center" width="20%"><b>First Name:</b></td>
                                                <td align="center" width="50%">
                                                    <a style="margin-left: 20px">
                                                        <?php
                                                    echo "$row[1]";
                                                    ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <br>
                                    <tr>
                                                <td align="center" width="20%"><b style="margin-left: 2px">Last Name:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="margin-left: 20px">
                                                      <?php
                                                    echo "$row[2]";
                                                    ?>  
                                                    </a>
                                                </td>
                                            </tr> 
                                             <br>
                                    <tr>
                                                <td align="center" width="20%"><b style="margin-left: -13px">Patient Type:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="margin-left: 20px">
                                                        <?php
                                                    echo "$row[3]";
                                                    ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                             <br>
                                    <tr>
                                                <td align="center" width="20%"><b style="margin-left: 50px">Age:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="margin-left: 20px">
                                         <?php
                                                    echo "$row[4]";
                                                    ?>
                                                    </a>
                                                </td>
                                            </tr>
                                            <br>
                                            <tr>
                                                <td align="center" width="20%"><b style="margin-left: 20px">Address:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="margin-left: 20px">
                                                        <?php
                                                    echo "$row[5]";
                                                    ?>
                                                    </a>
                                                </td>
                                            </tr> 

<?php
endwhile;
?>
                                   
                                </table>
                                 </div>
                             </div>
                             <br>
                              

  <center><h3>Check-up Details</h3></center> 
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Patient Name</th>
                      <th>Complains</th>
                      <th>Findings</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  
              <?php

$query = "SELECT c.check_id,concat(p.fname,'    ',p.lname)as 'name',c.complains,c.findings,c.date,c.status from check_up c,patients p where p.patient_id=c.patient_id and p.patient_id='".$id."'";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['check_id'].'</td>';
                             echo '<td>'. $row['name'].'</td>';
                              echo '<td>'. $row['complains'].'</td>';
                               echo '<td>'. $row['findings'].'</td>';
                                echo '<td>'. $row['date'].'</td>';
                                 echo '<td>'. $row['status'].'</td>';
                                 echo '<td> <a  type="button" class="btn btn-lg btn-warning fas fa-user-check" href="userdetails.php?action=post & id='.$row['check_id'] . '"></a> ';
                            echo '</tr> ';
                        }
                        
            ?> 
           
                            
                          </div>
                        </div>
                    </table>
                </div>

            <div id="content-wrapper">

        <div class="container-fluid">
 
            <?php include 'theme/footer.php'; ?>