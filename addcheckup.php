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
       <li class="nav-item active">
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
<?php
/*$hostname = "localhost";
$username = "root";
$password = "";
$databasename = "suarez_system_db";
*/
//$connect = mysqli_connect($hostname, $username, $password, $databasename);
$query = "SELECT * FROM patients";

$result = mysqli_query($db,$query);
?>

 <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Check-up</div>
        <div class="card-body">

                        <form role="form" method="post" action="transacc.php?action=add"> 
                            <div class="form-group">
                              <a>Patient:</a>
                              <select  name="pid" class="form-control">
                              <?php while($row = mysqli_fetch_array($result)):; ?>
                              <option value = "<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                              <?php endwhile; ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Complains" name="c" required>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Findings" name="f" required>
                            </div> 
                            <div class="form-group">
                               <input class="form-control" placeholder="Date" name="date" type="date" required >
                            </div>  
                            <button  class="btn btn-default">Save Record</button>
                            <button type="reset" class="btn btn-default">Clear Entry</button>
                             <button style ="margin-left:300px">
                            <a class="btn btn-default" href="checkdetails.php">Back</a>
                            </button>
                      </form>  
                    </div>
                </div>
              </div>
            </div>