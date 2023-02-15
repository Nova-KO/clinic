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
        <li class="nav-item active">
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
        <div class="card-header">Add Medicines</div>
        <div class="card-body">


                        <form role="form" method="post" action="transacm.php?action=add">
                            
                            <div class="form-group">
                              <input class="form-control" placeholder="Medicine Name" name="mn" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" type="number" placeholder="Quantity" name="qnty" required>
                            </div>
                            <div class="form-group">
                              <input class="form-control" hidden value="1" placeholder="Quantity" name="qty" required>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" hidden value="1" placeholder="Onhand" name="oh" required>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Prescription" name="pres" required>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Expiry Date YY/MM/DD" name="ed" type="date" required>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Requested Date YY/MM/DD" name="rd" type="date" required>
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Medcine Unique Id" name="mu" required>
                            </div> 
                            <button type="submit" class="btn btn-default">Save Record</button>
                            <button type="reset" class="btn btn-default">Clear Entry</button>
                             <button style ="margin-left:300px">
                            <a class="btn btn-default" href="medicines.php">Back</a>
                            </button>


                      </form>  
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->
            <?php include "theme/footer.php"  ?>