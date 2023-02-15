<?php
include "includes/connection.php";
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
        <div class="card-header">Login Client/Patients</div>
        <div class="card-body">
          <form role="form" align="center" action="" method="post">
                                <fieldset>
                                <div class="form-group">
                                        <select>
                                        <option>
                                        </option>
                                        </select>
                                      </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" placeholder="E-mail" id="email" name="user" type="text"  required>
                                      </div>
                                    <div class="form-group">
                                          <label>Password</label>
                                        <input class="form-control" placeholder="Password" id="pass" name="pass" type="password" value="" required>
                                    </div>
                                    <hr/>
                                    <center>
                                        <button  type="submit" name="login" class="btn btn-success btn-custom"><i class="glyphicon glyphicon-log-in"></i>  login</button>
                                    </center>
                                </fieldset>
                            </form>
        </div>
      </div>
    </div>';?>
           <?php
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
  
  $query=mysqli_query($db,"select * from `client` where user='$email' && pass=MD5('$fpass')");
  $num_rows=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
  
  if ($num_rows>0){
    $Message = "Login Successful!";
  }
  else{
  $Message = "Login Failed! User not found";
  $_SESSION['message']=$Message;
  unset($_SESSION['active']);
  unset($_SESSION['active2']);
  session_destroy();
  include "login.php";
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
<center>
<?php
  if ($Message=="Login Successful!"){
    $_SESSION["active"]=$row['firstname'];
    $_SESSION["active2"]=$row['lastname'];
   // echo $Message;
   // include "index.php";
    //include "footer.php";
    ?>
<script type="text/javascript">
      alert("Login Successfull.");
      window.location = "index.php";
    </script>

    <?php
  }
  else{
    echo $Message;

  }
  
          echo '    <!-- container -->
      </div>
    </div>
    <!-- Main div end -->
    <footer class="container-fluid" style="background:#444; color:#fff;">
            <p align="center">Copyright &copy; 2017</p>
            <p align="center">Website Developed By Aqib Sattar</p>
        </footer>
    <!-- footer end-->
  </body>
</html>';
?>