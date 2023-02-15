<?php
 include "includes/connection.php";
       session_start();
                
						$pid = $_POST['pid'];
					    $c = $_POST['c'];
                        $d = $_POST['date'];
                        //$_SESSION['pat']=$pid;

                        $sql = "SELECT * FROM `patients` where patient_id='".$pid."'";
                        $res = mysqli_query($db,$sql);
                        while ($row = mysqli_fetch_array($res)) {
                        $a = $row['fname'];
                        $_SESSION['pat']=$row['patient_id'];

        }
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO check_up
								(patient_id, complains, findings,date,status)
								VALUES ('".$pid."','".$c."','N/A','".$d."','ONGOING')";
								mysqli_query($db,$query)or die (mysqli_error($db));

								$query1 = "INSERT INTO notification
								(patient_id, username,type)
								VALUES ('".$pid."','".$a."','added')";
								mysqli_query($db,$query1)or die (mysqli_error($db));
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "userpatients.php";
		</script>