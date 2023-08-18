<!DOCTYPE html>
<html>
<head>
    <title>Registration of Employee</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>

</head>
<body>
<section class="bg-image" style="background-image: url('images/background.jpg');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <nav class="navbar navbar-inverse">
                                <div class="container-fluid">
                                    <div class="form-outline">
                                        <label class="form-label head-nav"><a style="color: #ffffff" href="index.php">Home</a></label>
                                        <label class="form-label head-nav"><a style="color: #ffffff" href="record.php">Add</a></label>
                                    </div>
                                </div>
                            </nav>

                            <h2 class="text-uppercase text-center mb-5">Employee Records</h1>

                            <nav class="navbar">
                                <div class="container-fluid">
                                    <div class="form-outline">
                                        <form class="form-inline mx-auto" action="index1.php" method="get">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="search" placeholder="Search by Name">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            <a href="index1.php" class="btn btn-secondary">Reset</a>
                                        </form>
                                    </div>
                                </div>
                            </nav>

                            <table id="employeeTable" class="table">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>DEPARTMENT</th>
                                    <th>EMAIL</th>
                                    <th>GENDER</th>
                                    <th>MOBILE NO.</th>
                                    <th>Hobbies</th>
                                    <th>Images</th>
                                    <th>ACTION</th>
                                  </tr>
                                </thead>


                            </table>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
                            <script>
$(document).ready(function() {
    $('#employeeTable').DataTable({
        "pagingType": "full_numbers",
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "fetch_data.php",  // Create a new PHP file (fetch_data.php) to handle data retrieval
            "type": "POST",
            "data": function(d) {
                d.search = $('input[type="search"]').val();
            }
        },
        "columns": [
            { "data": "emp_id" },
            { "data": "emp_name" },
            { "data": "emp_dept" },
            { "data": "emp_email" },
            { "data": "gender" },
            { "data": "mob" },
            { "data": "hob" },
            {
                "data": "image",
                "render": function(data) {
                    return '<img src="images/' + data + '" width="100" title="' + data + '">';
                }
            },
            {
                "data": "action",
                "orderable": false
            }
        ]
    });
});

</script>

<script>
    $(document).ready(function() {
    // ... Existing DataTables initialization code ...

    // Handle the Edit button click
    $('#employeeTable').on('click', '.edit-button', function() {
        var empId = $(this).data('empid');

        $.ajax({
            url: 'fetch_employee.php', // Create a new PHP file (fetch_employee.php) to fetch employee data
            type: 'GET',
            data: { empId: empId },
            success: function(response) {
                $('#editEmployeeModal .modal-body').html(response);
                $('#editEmployeeModal').modal('show');
            }
        });
    });

    $('#editEmployeeModal').on('click', '.modal-footer .btn-primary', function() {
        var formData = $('#editEmployeeForm').serialize();

        $.ajax({
            url: 'save_employee.php', // The PHP file to handle saving edited data
            type: 'POST',
            data: formData,
            success: function(response) {
                // Display a message indicating success or failure
                alert(response);

                // Close the modal if the data was successfully saved
                if (response.indexOf('success') !== -1) {
                    $('#editEmployeeModal').modal('hide');
                    // Refresh the DataTable to reflect the updated data
                    $('#employeeTable').DataTable().ajax.reload();
                }
            }
        });
    });

});


</script>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
