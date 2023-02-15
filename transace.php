
<?php
 include "theme/header.php";
						$en = $_POST['en'];
					    $rqd = $_POST['rqd'];
				
					switch($_GET['action']){
						case 'add':			
								$query = "INSERT INTO equipments
								(equip_name, requested_date, date_defected)
								VALUES ('".$en."','".$rqd."')";
								mysqli_query($db,$query)or die ('Error in updating Database');
							
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "equipments.php";
		</script>