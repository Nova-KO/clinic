 <?php
 include "includes/connection.php";
 //session_start();
 if(!isset($_SESSION['active'])){
     echo'<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">GUESS</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
          <div style="background-image: url(img/head.jpg);height: 340px;width: 1349px"></div>
          <br>';
 }else{
 ?>
 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">ADMIN</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
          <div style="background-image: url(img/head.jpg);height: 340px;width: 1349px"></div>
          <br>
          <?php
          }
          ?>