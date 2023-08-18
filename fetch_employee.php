<?php
if (isset($_GET['empId'])) {
    $empId = $_GET['empId'];

    // Perform database query to fetch employee details based on empId
    $sql = "SELECT * FROM employee WHERE emp_name LIKE '%$search%' OR emp_dept LIKE '%$search%'";
$result = mysqli_query($conn, $sql) or die("Query failed");

    // Example: $employeeData = performQueryToFetchEmployee($empId);

    // Assume $employeeData contains the employee details
    $empName = $result['emp_name'];
    $empDept = $result['emp_dept'];
    // ... (other fields)

    // Populate the modal form with employee details
    echo '<form id="editEmployeeForm">';
    echo '<input type="hidden" name="empId" value="' . $empId . '">';
    echo '<div class="form-group"><label>Name:</label><input type="text" class="form-control" name="emp_name" value="' . $empName . '"></div>';
    echo '<div class="form-group"><label>Department:</label><input type="text" class="form-control" name="emp_dept" value="' . $empDept . '"></div>';
    // ... (other form fields)
    echo '</form>';
}
?>
