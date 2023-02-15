<?php
include "theme/header.php";

			$zz = $_POST['id'];
			$mn = $_POST['mn'];
		    $qty = $_POST['qty'];
			$aq = $_POST['aq'];
			$des = $_POST['des'];
			$ed = $_POST['ed'];
			$rd = $_POST['rd'];
			
		
	 			$query = 'UPDATE medicines set med_name ="'.$mn.'",
					quantity ="'.$qty.'", onhand="'.$aq.'",
					prescription="'.$des.'",expiry_date="'.$ed.'",requested_date="'.$rd.'" WHERE
					med_id ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "medicines.php";
    </script>