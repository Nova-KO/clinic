<?php
 include "includes/connection.php";
                
						$pid = $_POST['pid'];
					    $c = $_POST['c'];
						$f = $_POST['f'];
                        $d = $_POST['date'];
                        //$stat = $_POST['ONGOING'];
           
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO check_up
								(patient_id,complains, findings,date,status)
								VALUES ('{$pid}','{$c}','{$f}','{$d}','ONGOING')";
								mysqli_query($db,$query)or die (mysqli_error($db));

								$query2 = "UPDATE check_up set status = 'ONGOING' where patient_id = '{$pid}'";
								mysqli_query($db,$query2)or die (mysqli_error($db));
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "check_up.php";
		</script>