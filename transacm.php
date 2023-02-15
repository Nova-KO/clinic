<?php
 include "theme/header.php";
						$mn = $_POST['mn'];
					    $qty = $_POST['qty'];
					    $qnty = $_POST['qnty'];
						$oh = $_POST['oh'];
						$pres = $_POST['pres'];
						$ed = $_POST['ed'];
                        $rd = $_POST['rd'];
                        $mu = $_POST['mu'];
				
					switch($_GET['action']){
						case 'add':	
						    for($i=1;$i <= $qnty;$i++){
								$query = "INSERT INTO medicines
								(med_name, quantity, onhand, prescription,expiry_date,requested_date,meduqid)
								VALUES ('".$mn."','".$qty."','".$oh."','".$pres."','".$ed."','".$rd."','".$mu."')";
								mysqli_query($db,$query)or die ('Error in updating Database');
						    }
						break;
									
						}
				?>
    	<script type="text/javascript">
			alert("Successfully added.");
			window.location = "medicines.php";
		</script>