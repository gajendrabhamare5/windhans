<?php
include_once("connection.php");
$search = "";
$search = isset($_POST['search']) ? $_POST['search'] : '';

$sql = "SELECT * FROM employee WHERE emp_name LIKE '%$search%' OR emp_dept LIKE '%$search%'";
$result = mysqli_query($conn, $sql) or die("Query failed");

$data = array();

if(mysqli_num_rows($result) > 0) {
    while($user = mysqli_fetch_assoc($result)) {
        $user_id = $user['emp_id'];
        $user['action'] = '<button type="button" onclick="openEditPopup('.$user_id.')" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</button>
        <button type="button" onclick="deleteRecord(' .$user_id .')" class="btn btn-danger icon-btn borderless"><i class="fa fa-trash"></i> Delete</button>';

        $data[] = $user;
    }
}

$response = array(
    "draw" => 1,
    "recordsTotal" => count($data),
    "recordsFiltered" => count($data),
    "data" => $data
);

echo json_encode($response);
?>
