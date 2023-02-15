 <?php
 include "includes/connection.php";
 //session_start();

if(!$_SESSION["active"]){
 header("Location: login.php");
}
else if($_SESSION["active"]!=='jude') {
header("Location: login.php");
}
if(isset($_SESSION['active'])){
  echo '
 <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-wheelchair"></i>
                  </div>
                  <div class="mr-5">Patients'?> <?php
                    $query = "SELECT count(*) from patients";
                    $result = mysqli_query($db,$query);
                     while($row = mysqli_fetch_array($result)):; 
                   echo "(".$row[0].")"; 
                    endwhile;
                   echo'</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="patients.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-check"></i>
                  </div>
                  <div class="mr-5">Check-up'?> <?php
                    $query = "SELECT count(*) from check_up";
                    $result = mysqli_query($db,$query);
                     while($row = mysqli_fetch_array($result)):; 
                   echo "(".$row[0].")"; 
                    endwhile;
                   echo'</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="check_up.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-briefcase-medical"></i>
                  </div>
                  <div class="mr-5">Medicines'?> <?php
                    $query = "SELECT count(meduqid) from medicines";
                    $result = mysqli_query($db,$query);
                     while($row = mysqli_fetch_array($result)):; 
                   echo "(".$row[0].")"; 
                    endwhile;
                   echo'</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="medicines.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-database"></i>
                  </div>
                  <div class="mr-5">Check-up Details'?> <?php
                    $query = "SELECT count(*) from checkup_details";
                    $result = mysqli_query($db,$query);
                     while($row = mysqli_fetch_array($result)):; 
                   echo "(".$row[0].")"; 
                    endwhile;
                   echo'</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="checkdetails.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
             <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-toolbox"></i>
                  </div>
                  <div class="mr-5">Equipments'?> <?php
                    $query = "SELECT count(*) from equipments";
                    $result = mysqli_query($db,$query);
                     while($row = mysqli_fetch_array($result)):; 
                   echo "(".$row[0].")"; 
                    endwhile;
                   echo'</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="equipments.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                  </div>
                  <div class="mr-5">List of Registered'?> 
                  <?php
                  $query = "SELECT count(*) from admin";
                    $result = mysqli_query($db,$query);
                     while($row = mysqli_fetch_array($result)):; 
                   echo "(".$row[0].")"; 
                    endwhile;
                    echo'
                 </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="list.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div';
      }else{
        echo '
        <div style="margin-left:500px">
        <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-user-check"></i>
                  </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="login.php">
                  <span class="float-left">LOG IN</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            </div>
            </div>';
      }
      ?>