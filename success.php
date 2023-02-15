<?php
include "includes/connection.php";
session_start();
if(isset($_SESSION["active"]) && $_SESSION["active"]=='jude'){
 header("Location: index.php");
}else if(isset($_SESSION["active"])){
  header("Location: homepage.php");
}else{
// define variables and set to empty values
$Message = $Erroremail = $Errorpass = "";
if(isset($_POST['login'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if ($_POST['user']=='jude@yahoo.com' && $_POST['pass']=='12345'){
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
    $_SESSION["userf"]=$row['firstname'];
    $_SESSION["userl"]=$row['lastname'];
    $_SESSION["active"]=$row['firstname'];
    $_SESSION["active2"]=$row['lastname'];
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
}
?>