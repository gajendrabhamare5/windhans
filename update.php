<?php
if(isset($_POST['update'])) {
    include_once("connection.php");

    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $emp_dept = $_POST['emp_dept'];
    $emp_email = $_POST['emp_email'];
    $gender = $_POST['gender'];
    $mob = $_POST['mob'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];


    $hob = isset($_POST['hob']) ? $_POST['hob'] : array();
    $hob1 = implode(",", $hob);


    if (!empty($image)) {
        move_uploaded_file($image_tmp, "images/$image");
    } else {

        $sql_select_image = "SELECT image FROM employee WHERE emp_id='$emp_id'";
        $result_select_image = mysqli_query($conn, $sql_select_image);

        if ($result_select_image && mysqli_num_rows($result_select_image) > 0) {
            $row_image = mysqli_fetch_assoc($result_select_image);
            $image = $row_image['image'];
        }
    }

    $sql = "UPDATE employee SET emp_name='$emp_name', emp_dept='$emp_dept', emp_email='$emp_email', gender='$gender', mob='$mob', hob='$hob1', image='$image' WHERE emp_id='$emp_id'";

    if(mysqli_query($conn, $sql)) {
        header("location: index.php");
    } else {
        echo "Update failed";
    }
}


?>