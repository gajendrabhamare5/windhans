<?php
 include_once("connection.php");
if(isset($_POST['submit']))
{


$emp_name=$_POST['emp_name'];
$emp_dept=$_POST['emp_dept'];
$emp_email=$_POST['emp_email'];
$gender=$_POST['gender'];
$mob=$_POST['mob'];
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$hob=$_POST['hob'];

$hob1=implode(",", $hob);

move_uploaded_file($image_tmp,"images/$image");


 $sql="insert into employee(emp_name,emp_dept,emp_email,gender,mob,hob,image)
 values('$emp_name','$emp_dept','$emp_email','$gender','$mob','$hob1','$image')";

    if(mysqli_query($conn,$sql))

			{
				header("location:index.php");
			}
			else
			{
				echo "query failed";
			}
}

?>