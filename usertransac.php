
<?php
 include "includes/connection.php";
                
						$fname = $_POST['firstname'];
					    $lname = $_POST['lastname'];
						$type = $_POST['type'];
						$age = $_POST['age'];
						$address = $_POST['address'];
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO patients
								(fname, lname, patient_type, age,address)
								VALUES ('".$fname."','".$lname."','".$type."','".$age."','".$address."')";
								mysqli_query($db,$query)or die ('Error in updating Database');
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "usercheck_up.php";
		</script>