<?php
include "theme/header.php";
			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
		    $lname = $_POST['lastname'];
			$type = $_POST['type'];
			$age = $_POST['age'];
			$address = $_POST['address'];
			
		
	 			$query = 'UPDATE patients set fname ="'.$fname.'",
					lname ="'.$lname.'", patient_type="'.$type.'",
					age="'.$age.'",address="'.$address.'" WHERE
					patient_id ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
?>	
<?php
if(isset($fname,$lname,$type,$age,$address)){
    ?>
    <script type="text/javascript">
			alert("Update Successfull.");
			window.location = "patients.php";
	</script>
<?php  	
}else{
	echo "cannot update";
}
?>