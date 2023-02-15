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
       <li class="nav-item active">
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
      <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Check up Details</div>
        <div class="card-body">
                    
                              

                                    

                                   <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT concat(p.fname,'    ',p.lname),c.complains,c.findings,c.date,c.status from check_up c,patients p where p.patient_id=c.patient_id and c.check_id='".$id."'";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                           
                                                          
                                                            ?>
                                    

                                    <tr>
                                                <td align="center" width="20%"><b>Patient Name:</b></td>
                                                <td align="center" width="50%">
                                                    <a style="margin-left: 20px">
                                                        <?php
                                                    echo "$row[0]";
                                                    ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <br>
                                    <tr>
                                                <td align="center" width="20%"><b style="margin-left: 23px">Complains:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="margin-left: 20px">
                                                      <?php
                                                    echo "$row[1]";
                                                    ?>  
                                                    </a>
                                                </td>
                                            </tr> 
                                             <br>
                                    <tr>
                                                <td align="center" width="20%"><b style="margin-left: 37px">Findings:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="margin-left: 20px">
                                                        <?php
                                                    echo "$row[2]";
                                                    ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <?php
                                         $query1 = "SELECT m.med_name,count(m.quantity),m.expiry_date from checkup_details cd,medicines m where m.med_id = cd.med_id and cd.check_id='".$id."' group by m.meduqid ";
                                                        $result1 = mysqli_query($db,$query1);
                                                        while($row1 = mysqli_fetch_array($result1)):;
                                        ?>
                                             <br>
                                    <tr>
                                                <td align="center" width="20%"><b style="margin-left: 32px">Medicine:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="margin-left: 20px">
                                        <?php
                                                    echo "$row1[0]";
                                                    ?>
                                                    </a>
                                                </td>
                                            </tr>
                                            <br>
                                            <tr>
                                                <td align="center" width="20%"><b style="margin-left: 34px">Quantity:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="margin-left: 20px">
                                                        <?php
                                                    echo "$row1[1]";
                                                    ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <br>
                                            <tr>
                                                <td align="center" width="20%"><b style="margin-left: 12px">Expiry Date:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="margin-left: 20px">
                                                        <?php
                                                    echo "$row1[2]";
                                                endwhile;
                                                    ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <br>
                                    <tr>
                                                <td align="center" width="20%"><b style="margin-left: 62px">Date:</b></td>
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
                                                <td align="center" width="20%"><b style="margin-left: 51px">Status:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="margin-left: 20px">
                                                        <?php
                                                    echo "$row[4]";
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
                              

  <center><h3>Patient Details</h3></center> 
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
                    </tr>
                  </thead>
              <?php

$query = "SELECT p.patient_id,p.fname,p.lname,p.patient_type,p.age,p.address FROM check_up c,patients p where c.patient_id=p.patient_id and c.check_id='".$id."'";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['patient_id'].'</td>';
                             echo '<td>'. $row['fname'].'</td>';
                              echo '<td>'. $row['lname'].'</td>';
                               echo '<td>'. $row['patient_type'].'</td>';
                                echo '<td>'. $row['age'].'</td>';
                                 echo '<td>'. $row['address'].'</td>';
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