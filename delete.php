<?php
error_reporting(0);
include_once("connection.php");

$emp_id=$_GET['id'];

	$sql="Delete from employee where emp_id='$emp_id'";

	if (mysqli_query($conn, $sql)) {
		// Record deleted successfully, show success message and redirect
		echo "ok";
	} else {
		// Error deleting record, show error message
		echo "error";
	}
	?>





