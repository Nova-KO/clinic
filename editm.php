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
            <i class="fas fa-fw fa-table"></i>
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
            <i class="fas fa-fw fa-table"></i>
            <span>Medicines</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="checkdetails.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Check-up Details</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="equipments.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Equipments</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list.php">
            <i class="fas fa-fw fa-table"></i>
            <span>List of Registered</span></a>
        </li>
      </ul>
<?php
}
?>

<?php
$query = 'SELECT * FROM medicines
              WHERE
              med_id ='.$_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $zz= $row['med_id'];
                $mn= $row['med_name'];
                $i= $row['quantity'];
                $a=$row['onhand'];
                $b=$row['prescription'];
                $c=$row['expiry_date'];
                $d=$row['requested_date'];
             
              }
              
              $id = $_GET['id'];
         
?>

               <div class="container">
                 <div class="card card-register mx-auto mt-5">
                   <div class="card-header">Update Medicines</div>
                     <div class="card-body">

                        <form role="form" method="post" action="editm2.php">
                            
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Medicine Name" name="mn" value="<?php echo $mn; ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Quantity" name="qty" value="<?php echo $i; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Onhand" name="aq" value="<?php echo $a; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="prescription" name="des" value="<?php echo $b; ?>">
                            </div> 
                            <div class="form-group">
                              <input class="form-control" placeholder="Expiry Date" name="ed" value="<?php echo $c; ?>">
                            </div>
                            <div class="form-group">
                              <input class="form-control" placeholder="Requested Date" name="rd" value="<?php echo $d; ?>">
                            </div> 
                            <button type="submit" class="btn btn-default">Update Record</button>
                         


                      </form>  
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

       <?php include "theme/footer.php" ?>