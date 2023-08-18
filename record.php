<!DOCTYPE html>
<html>
<head>
        <title>Registration of Employee</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>    
            function validate() 
              {    
                var emp_name = document.reg_form.emp_name;    
                var emp_dept = document.reg_form.emp_dept;    
                var emp_email = document.reg_form.emp_email;    
                var gender = document.reg_form.gender; 
                var mob = document.reg_form.mob;   
        
                if (emp_name.value.length <= 0) 
                {    
                    alert("Name is required");    
                    emp_name.focus();    
                    return false;    
                }    
                if (emp_dept.value.length <= 0) 
                {    
                    alert("department is required");    
                    emp_dept.focus();    
                    return false;    
                }     
                if (gender.value.length <= 0) 
                {    
                    alert("Gender is required");    
                    gender.focus();    
                    return false;    
                }    
                if (email.value.length <= 0)
                {    
                    alert("Email Id is required");    
                    email.focus();    
                    return false;    
                }    
                if (mob.value.length <= 0) 
                {    
                    alert("Mobile number is required");    
                    mob.focus();    
                    return false;    
                }     
                return false;    
            }    
        </script>  
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
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
              <h2 class="text-uppercase text-center mb-5">Registration Form</h2>

              <form action="connected.php" method="post" name="reg_form" onsubmit="return validate()" enctype="multipart/form-data">

                <div class="form-outline mb-4">
                  <label class="form-label">Enter Your Full Name</label>
                  <input type="text" class="form-control form-control-lg" name="emp_name" placeholder="Employee Name"/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Department</label>
                  <input type="text" class="form-control form-control-lg" name="emp_dept" placeholder="Employee department"/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Enter Your Email</label>
                  <input type="email" class="form-control form-control-lg" name="emp_email" placeholder="Employee email"/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Phone No.</label>
                  <input type="number" class="form-control form-control-lg" name="mob"/>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label mr-4">Gender</label>
                  <input type="radio" name="gender" class="ml-4" value="male">Male
                  <input type="radio" name="gender" value="female">Female
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label mr-4">Select Hobbies</label>
                
                  <label class="form-label">sports</label>
                  <input type="checkbox" class="" value="sports" name="hob[]"/>
                  <label class="form-label">Cooking</label>
                  <input type="checkbox" value="cooking" name="hob[]"/>
                  <label class="form-label">Reading</label>
                  <input type="checkbox" value="reading" name="hob[]">
                  <label class="form-label">Movies</label>
                  <input type="checkbox" value="movies" name="hob[]">
                  <label class="form-label">Music</label>
                  <input type="checkbox" value="music" name="hob[]">
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Upload Image:</label>
                  <input type="file" name="image" id="profile-img" required/><br>
                                                    <img src="" id="profile-img-tag" width="100px" />

                                                    <script type="text/javascript">
                                                        function readURL(input) {
                                                            if (input.files && input.files[0]) {
                                                                var reader = new FileReader();
                                                                
                                                                reader.onload = function (e) {
                                                                    $('#profile-img-tag').attr('src', e.target.result);
                                                                }
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                        $("#profile-img").change(function(){
                                                            readURL(this);
                                                        });
                                                    </script>
                </div>

                  <div class="d-flex justify-content-center">
                 
                      <input type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="submit" value="Submit">
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