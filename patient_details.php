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
            <span>Check-up</span></a>
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
      <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Check up Details</div>
        <div class="card-body">
                    
                              

                                    

                                    <tr>
                                                <td align="center" width="20%"><b>Patient Name:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="color:lightgreen">
                                                        <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT concat(fname,'    ',lname) from patients where patient_id='".$id."'";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                         echo "$row[0]"; 
                                                          endwhile;
                                                            
                                                            ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <br>
                                            <br>
                                             <tr>
                                                <td align="center" width="20%"><b>Patient Type:</b></td>
                                                <td align="center" width="20%">
                                                   <a style="color:lightgreen">
                                                        <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT patient_type from patients where patient_id='".$id."'";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                         echo "$row[0]"; 
                                                          endwhile;
                                                            
                                                            ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <br>
                                            <br>
                                    <tr>
                                                <td align="center" width="20%"><b>Complains:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="color:lightgreen">
                                                        <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT complains from check_up where patient_id='".$id."'";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                         echo "$row[0],"; 
                                                          endwhile;
                                                            ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <br>
                                            <br>
                                    <tr>
                                                <td align="center" width="20%"><b>Findings:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="color:lightgreen">
                                                        <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT findings from check_up where patient_id='".$id."'";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                         echo "$row[0],"; 
                                                          endwhile;
                                                            ?>
                                                    </a>
                                                </td>
                                            </tr>
                                            <br>
                                            <br>
                                    <tr>
                                                <td align="center" width="20%"><b>Medicine:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="color:lightgreen">
                                                        <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT m.med_name from checkup_details cd, check_up c,medicines m where cd.check_id=c.check_id and cd.med_id=m.med_id and c.patient_id='".$id."' group by m.meduqid";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                         echo "$row[0],"; 
                                                          endwhile;
                                                            ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <?php echo " ";  ?>
                                            <tr>
                                                <td align="center" width="20%"><b>Quantity:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="color:lightgreen">
                                                        <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT count(m.quantity) from checkup_details cd, check_up c,medicines m where cd.check_id=c.check_id and cd.med_id=m.med_id and c.patient_id='".$id."' group by m.med_name";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                         echo "$row[0],"; 
                                                          endwhile;
                                                            ?>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <br>
                                            <br>
                                            <tr>
                                                <td align="center" width="20%"><b>Expiry Date:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="color:lightgreen">
                                                        <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT m.expiry_date from checkup_details cd, check_up c,medicines m where cd.check_id=c.check_id and cd.med_id=m.med_id and c.patient_id='".$id."' group by m.med_name";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                         echo "$row[0],"; 
                                                          endwhile;
                                                            ?>
                                                    </a>
                                                </td>
                                            </tr>
                                            <br>
                                            <br>
                                    <tr>
                                                <td align="center" width="20%"><b>Date of Check-up:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="color:lightgreen">
                                                        <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT date from check_up where patient_id='".$id."'";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                         echo "$row[0],"; 
                                                          endwhile;
                                                            ?>
                                                    </a>
                                                </td>
                                            </tr>
                                            <br>
                                            <br>
                                    <tr>
                                                <td align="center" width="20%"><b>Status:</b></td>
                                                <td align="center" width="20%">
                                                    <a style="color:lightgreen">
                                                        <?php
                                                        $id = $_GET['id'];
                                                        $query = "SELECT status from check_up where patient_id='".$id."'";
                                                        $result = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_array($result)):; 
                                                         echo "$row[0],"; 
                                                          endwhile;
                                                            ?>
                                                    </a>
                                                </td>
                                            </tr> 




                                   
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>

  

            <div id="content-wrapper">

        <div class="container-fluid">
 
            <?php include 'theme/footer.php'; ?>