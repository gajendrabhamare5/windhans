<!DOCTYPE html>
<html>
<head>
    <title>Registration of Employee</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

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
                                        <form class="form-inline mx-auto" action="fetch_data.php" method="get">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="search" placeholder="Search by Name">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            <a href="index.php" class="btn btn-secondary">Reset</a>
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

                            <script>
$(document).ready(function() {
    $('#employeeTable').DataTable({
        "pagingType": "full_numbers",
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "fetch_data.php",
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
         function deleteRecord($user_id){
            var delete_id = $user_id;

            // alert(delete_id);
					if(confirm('Are You Sure You Want To Delete?')){
						$.ajax({
							type: "POST",
							url: "delete.php?id="+delete_id,
							success: function(response){
								if(response == "error"){
									alert("You cannot delete record!");
								}else if(response.trim() == "ok"){
									// location.reload();
                                    window.location.href = "index.php";
								}
							}
						});
						//alert(delete_id);

					}


		}

    </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
function openEditPopup($user_id) {

     var editLink = 'edit1.php?emp_id=' + $user_id;
    //   alert(editLink);
    // $('#editModalLink').attr('href', editLink);

    // $('#editModal').modal('show');

    $('input[name="hob[]"]:checked').each(function() {
        selectedHobbies.push($(this).val());
    });

    $.ajax({
        url: editLink,
        method: 'GET',
        success: function(response) {

            var data = JSON.parse(response);
             $('#emp_id').val(data.emp_id);
            $('#emp_name').val(data.emp_name);
            $('#emp_dept').val(data.emp_dept);
            $('#emp_email').val(data.emp_email);
            //$('#gender').val(data.gender);
            $('#mob').val(data.mob);
           // $('#hob').val(data.hob);
            $('#image').val(data.image);



            if (data.gender === 'Male') {
                $('#genderMale').prop('checked', true);
            } else if (data.gender === 'Female') {
                $('#genderFemale').prop('checked', true);
            }

            var selectedHobbies = data.hob.split(',');
            selectedHobbies.forEach(function(hobby) {
            $('#' + hobby).prop('checked', true);
            });

            $('#editModal').modal('show');
        }
    });

}
</script>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $row['emp_id']; ?>">
                    <div class="form-outline mb-4">
                        <label class="form-label">Enter Your Full Name</label>
                        <input type="text" class="form-control form-control-lg" id="emp_name" name="emp_name" value="" />
                    </div>
                    <div class="form-outline mb-4">
                  <label class="form-label">Department</label>
                  <input type="text" class="form-control form-control-lg" id="emp_dept" name="emp_dept" value=""/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Enter Your Email</label>
                  <input type="email" class="form-control form-control-lg" id="emp_email" name="emp_email" value=""/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Phone No.</label>
                  <input type="number" class="form-control form-control-lg" id="mob" name="mob" value=""/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label mr-4">Gender</label>
                  <input type="radio" name="gender" id="genderMale" class="ml-4" value="Male" <?php  echo 'checked'; ?>>Male
                  <input type="radio" name="gender" id="genderFemale" value="Female" <?php  echo 'checked'; ?>>Female
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label mb-4">Select Hobbies</label>

                    <?php
                    $hobbies = array('sports', 'cooking', 'reading', 'movies', 'music');

                    foreach ($hobbies as $hobby) {
                       // $isChecked = in_array($hobby, explode(',',)) ? 'checked' : '';
                        echo '<div class="form-check">';
                        echo '<input class="form-check-input" type="checkbox" value="' . $hobby . '" name="hob[]"  id="' . $hobby . '">';
                        echo '<label class="form-check-label" for="' . $hobby . '">' . ucfirst($hobby) . '</label>';
                        echo '</div>';
                    }
                    ?>

                </div>

                <div class="form-outline mb-4">
                <img class="mb-4" src="images/<?php echo $row['image']; ?>" width=200 title="<?php //echo $row['image']; ?>"><br>
                  <label class="form-label">Upload Image:</label>
                  <!-- <lable align="right">Image:</lable>  <br> -->
                <input type="file" name="image" id="profile-img" /><br>
                </div>

                    <div class="d-flex justify-content-center">
                        <input type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="update" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
</body>
</html>
