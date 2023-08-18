<?php
include ("connection.php");
$emp_id = $_GET['emp_id'];

$sql="select * from employee where emp_id=$emp_id";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    echo json_encode($row);
}
?>