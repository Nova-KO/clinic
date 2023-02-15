<?php
 include "theme/header.php";
						$ci = $_POST['ci'];
						$mi = $_POST['mi'];
						$f = $_POST['f'];

						if ($mi) {
							foreach ($mi as $m) {
								# code...
										
			mysqli_query($db,"INSERT INTO checkup_details(check_id,med_id)VALUES ('".$ci."','".mysqli_real_escape_string($db,$m)."')");
								//or die ('Error in updating Database');

								
						
							}
							# code...
						}
						$mi = $_POST['mi'];
						if ($mi) {
							foreach ($mi as $m) {

                          $query= "UPDATE `medicines` SET onhand = onhand-quantity  WHERE med_id ='".mysqli_real_escape_string($db,$m)."'";
								mysqli_query($db,$query)or die (mysqli_error($db));
								
								$query3 = "UPDATE check_up set findings = '".$f."',status = 'COMPLETE' where check_id = '".$ci."'";
								mysqli_query($db,$query3)or die (mysqli_error($db));
								
								
							}
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "checkdetails.php";
		</script>