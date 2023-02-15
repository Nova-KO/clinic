<?php
include "theme/header.php";
			$zz = $_POST['id'];
			$en = $_POST['en'];
		    $rqd = $_POST['rqd'];
			
		
	 			$query = 'UPDATE equipments set equip_name ="'.$en.'",
					requested_date ="'.$rqd.'" WHERE
					equip_id ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
	<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "equipments.php";
		</script>
 </body>
</html>