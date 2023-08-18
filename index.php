<?php
 include_once("connection.php");
?>
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
                                        <form class="form-inline mx-auto" action="" method="get">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="search" placeholder="Search by Name">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                            <a href="index.php" class="btn btn-secondary">Reset</a>
                                        </form>
                                    </div>
                                </div>
                            </nav>

                            <table class="table">
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

                                <?php


                                $search = isset($_GET['search']) ? $_GET['search'] : '';

                                 $sql = "SELECT * FROM employee WHERE emp_name LIKE '%$search%' OR emp_dept LIKE '%$search%'";
                                $result = mysqli_query($conn, $sql) or die("Query failed");

                                if(mysqli_num_rows($result) > 0){
                                    while($user = mysqli_fetch_assoc($result)){
                                        $user_id = $user['emp_id'];
                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $user_id?></td>
                                    <td><?php echo $user['emp_name']?></td>
                                    <td><?php echo $user['emp_dept']?></td>
                                    <td><?php echo $user['emp_email']?></td>
                                    <td><?php echo $user['gender']?></td>
                                    <td><?php echo $user['mob']?></td>
                                    <td><?php echo $user['hob']?></td>
                                    <td><img src="images/<?php echo $user['image']; ?>" width=100 title="<?php echo $user['image']; ?>">
                                    </td>
                                    <td>
                                        <a href="edit.php?emp_id=<?php echo $user['emp_id'];?>" class="btn-sm btn-warning" title="Edit"> <i class="fa fa-edit">Edit</i></a>

                                        <button type="button" onclick="deleteRecord(<?php echo $user_id  ?>)" class="btn btn-danger icon-btn borderless"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                </tbody>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
         function deleteRecord($user_id){
            var delete_id = $user_id;


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
</section>
</body>
</html>



