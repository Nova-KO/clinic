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
<?php include "theme/userheader.php" ?>
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
          <a class="nav-link" href="userpatients.php">
            <i class="fas fa-fw fa-wheelchair"></i>
            <span>Patients</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="usercheck_up.php">
            <i class="fas fa-fw fa-check"></i>
            <span>Check-up</span></a>
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
$query = "SELECT patient_id,concat(fname,\" \",lname) FROM patients";

$result = mysqli_query($db,$query);
?>

 <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Check-up</div>
        <div class="card-body">

                        <form role="form" method="post" action="usertransacc.php?action=add"> 
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
                      </form>  
                    </div>
                </div>
              </div>
            </div>
            <?php
            include "theme/userfooter.php";
            ?>