<?php
 include "includes/connection.php";
 session_start();
    # code...
if (isset($_POST['register'])) {
                
						$firstname=$_POST['firstname'];
                        $lastname=$_POST['lastname'];
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                        $confirm=$_POST['confirm'];
                        $type=$_POST['type'];
                        $age=$_POST['age'];
                        $address=$_POST['address'];
						
								$query = "INSERT INTO admin (firstname,lastname,username,password,status) VALUES ('".$firstname."','".$lastname."','".$email."',md5('".$password."'),'CLIENT')";
								mysqli_query($db,$query)or die ('Error in updating Database');
								
								$query1 = "INSERT INTO patients (fname,lname,patient_type,age,address) VALUES ('".$firstname."','".$lastname."','".$type."','".$age."','".$address."')";
								mysqli_query($db,$query1)or die ('Error in updating Database');
							
					
						}
					
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "login.php";
		</script>