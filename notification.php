<?php
include "includes/connection.php";
session_start();

                                $query = "DELETE FROM notification where patient_id ='".$_SESSION['p']."'";
								mysqli_query($db,$query)or die (mysqli_error($db));
  include "check_up.php";
  ?>
