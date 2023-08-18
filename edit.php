<?php
include_once("connection.php");
$emp_id=$_GET['emp_id'];
$sql="select * from employee where emp_id=$emp_id";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result))
	{
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
<section class=" bg-image"
  style="background-image: url('images/background.jpg');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
                <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="form-outline">
                        <label class="form-label head-nav"><a style="color: #ffffff" href="index.php">Home</a></label>
                        <label class="form-label head-nav"><a style="color: #ffffff" href="record.php">Add</a></label>
                        <!-- <label class="form-label head-nav"><a style="color: #ffffff" href="edit.php">Update</a></label> -->
                    </div>
                </div>
              </nav>
              <h2 class="text-uppercase text-center mb-5">Update Form</h2>


              <form action="update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="emp_id" value="<?php echo $row['emp_id'];?>">

                <div class="form-outline mb-4">
                  <label class="form-label">Enter Your Full Name</label>
                  <input type="text" class="form-control form-control-lg" name="emp_name" value="<?php echo $row['emp_name'];?>"/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Department</label>
                  <input type="text" class="form-control form-control-lg" name="emp_dept" value="<?php echo $row['emp_dept'];?>"/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Enter Your Email</label>
                  <input type="email" class="form-control form-control-lg" name="emp_email" value="<?php echo $row['emp_email'];?>"/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Phone No.</label>
                  <input type="number" class="form-control form-control-lg" name="mob" value="<?php echo $row['mob'];?>"/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label mr-4">Gender</label>
                  <input type="radio" name="gender" class="ml-4" value="Male" <?php if($row['gender'] === 'Male') echo 'checked'; ?>>Male
                  <input type="radio" name="gender" value="Female" <?php if($row['gender'] === 'Female') echo 'checked'; ?>>Female
                </div>

              <!--   <div class="form-outline mb-4">
                  <label class="form-label mr-4">Select Hobbies</label>
                
                  <label class="form-label">sports</label>
                  <input type="checkbox" class="" value="sports" value="<?php echo $row['hob'];?>" name="hob[]"/>
                  <label class="form-label">Cooking</label>
                  <input type="checkbox" value="cooking" value="<?php echo $row['hob'];?>" name="hob[]"/>
                  <label class="form-label">Reading</label>
                  <input type="checkbox" value="reading" value="<?php echo $row['hob'];?>" name="hob[]">
                  <label class="form-label">Movies</label>
                  <input type="checkbox" value="movies" value="<?php echo $row['hob'];?>" name="hob[]">
                  <label class="form-label">Music</label>
                  <input type="checkbox" value="music" value="<?php echo $row['hob'];?>" name="hob[]">
                </div> -->

                <div class="form-outline mb-4">
                    <label class="form-label mb-4">Select Hobbies</label>

                    <?php
                    $hobbies = array('sports', 'cooking', 'reading', 'movies', 'music');

                    foreach ($hobbies as $hobby) {
                        $isChecked = in_array($hobby, explode(',', $row['hob'])) ? 'checked' : '';
                        echo '<label class="form-label">' . ucfirst($hobby) . '</label>';
                        echo '<input type="checkbox" value="' . $hobby . '" name="hob[]" ' . $isChecked . ' />';
                    }
                    ?>

                </div>

                <div class="form-outline mb-4">
                <img class="mb-4" src="images/<?php echo $row['image']; ?>" width=200 title="<?php echo $row['image']; ?>"><br>
                  <label class="form-label">Upload Image:</label>
                  <lable align="right">Image:</lable>  <br>                          
                <input type="file" name="image" id="profile-img" /><br>
                </div>

                  <div class="d-flex justify-content-center">
                      <input type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="update" value="update">
                  </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>


<?php 
}
}
?>