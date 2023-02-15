<?php
include "includes/connection.php";
session_start();
if(isset($_SESSION["active"]) && $_SESSION["status"]=='ADMIN'){
 header("Location: index.php");
}else if(isset($_SESSION["active"])){
  header("Location: homepage.php");
}else{
?>
<?php
}
// define variables and set to empty values
$Message = $Erroremail = $Errorpass = "";
if(isset($_POST['login'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = check_input($_POST["user"]);
  
    if (!preg_match("/^[a-zA-Z0-9_]*$/",$email)) {
      $Erroremail = ""; 
    }
  else{
    $femail=$email;
  }
 
  $fpass = check_input($_POST["pass"]);

  if ($Erroremail!=""){
  $Message = "Login failed! Errors found";

  }
  else{
  include "includes/connection.php";
  
  $query=mysqli_query($db,"select * from `admin` where username='$email' && password=MD5('$fpass')");
  $num_rows=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
   $_SESSION["userf"]=$row['firstname'];
    $_SESSION["userl"]=$row['lastname'];
    $_SESSION["status"]=$row['status'];
    $_SESSION["active"]=$row['firstname'];
    $_SESSION["active2"]=$row['lastname'];
     if ($_SESSION['status']=='ADMIN'){
   // echo $Message;
   // include "index.php";
    //include "footer.php";
    ?>
<script type="text/javascript">
      alert("Login Successfull.");
      window.location = "index.php";
    </script>

    <?php
   }?>
   <?php
  
  if ($num_rows>0){
    $Message = "Login Successful!";
  }
  else{
  $Message = "Login Failed! User not found";
  $_SESSION['message']=$Message;
  unset($_SESSION['active']);
  unset($_SESSION['active2']);
  unset($_SESSION['userf']);
  unset($_SESSION['userl']);
  session_destroy();
  ?>
  <script>
  alert("Wrong Password/User!");
   window.location = "login.php";
 </script>
   <?php
  }
  
  }
}
}

function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
  if ($Message=="Login Successful!"){
    $query2 = "SELECT * FROM patients WHERE fname = '".$_SESSION['userf']."' AND lname = '".$_SESSION['userl']."'";
								 $result = mysqli_query($db,$query2);
								
								while($row = mysqli_fetch_array($result)):; 
                                $_SESSION['get']=$row[0];
									endwhile;
   // echo $Message;
   // include "index.php";
    //include "footer.php";
    ?>
<script type="text/javascript">
      alert("Login Successfull.");
      window.location = "homepage.php";
    </script>

    <?php
  }
  else{
    echo $Message;

  }
//unset($_SESSION['active']);
//session_destroy();
//header("Location: login.php");
echo '<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
           <form method="POST" action="#">
                                <fieldset>
                                    <div class="form-group">
                                       
                                        <input class="form-control" placeholder="E-mail" id="email" name="user" type="text"  required>
                                      </div>
                                    <div class="form-group">
                                          
                                        <input class="form-control" placeholder="Password" id="pass" name="pass" type="password" value="" required>
                                    </div>
                                    <hr/>
                                    <center>
                                        <button type = "submit" name="login" value="login" class="btn btn-success btn-custom"><i class="glyphicon glyphicon-log-in fas fa-sign-out-alt fa-fw"></i>  login</button>
                                    </center>
                                </fieldset>
                            </form>
                            <div class="text-center">
            <a class="d-block small mt-3" href="register1.php">Register an Account</a>
          </div>
                           
        </div>
        </div>
      </div>
    </div>';
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>