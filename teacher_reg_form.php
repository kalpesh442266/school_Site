<?php

session_start();
include 'server.php';
include 'classes/teacher_class.php';
include 'classes/validation.php'; 

header("Cache-Control: no-cache, must-revalidate");
  

function test_input($data) {
  $data = trim($data);  
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ((isset($_SESSION['isLoggedInOnSchoolWebsite'])) && $_SESSION['isLoggedInOnSchoolWebsite'] == true) {

      
  $name = $id = $email = $gender = $job_start_date = $education = $mobile_no = $password = "";



  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = test_input($_POST["name"]);
    $id = test_input($_POST["id"]);
    $email = test_input($_POST["email"]);
    $gender = test_input($_POST["gender"]);
    $job_start_date = test_input($_POST["job_start_date"]);
    $education = test_input($_POST["education"]);
    $mobile_no = test_input($_POST["mobile_no"]);
    $password = test_input($_POST["pwd"]);

    $teacher = new Teacher; 
    $validation = new Validation();
 
    $message = '';

    if(isset($_POST["login"]))  
    {  
        $field = array(  
           'name'=> $name,
           'id'=> $id,
           'email' => $email,
           'gender' => $gender,
           'job_start_date' => $job_start_date,
           'education' => $education,
           'mobile_no' => $mobile_no,
           'password' => $password,  
        );  
        // $teacher->add_teacher($field);
        if($validation->required_validation($field))  
        {  
             if($teacher->add_teacher($field))
             {  

                  $message = "teacher entered successfully";  

                  // $_SESSION["username"] = $_POST["username"];
                    // header("location:admin.php");  
                  
             }
             else  
             {  
                  $message = $teacher->error; 
             } 
        }  
        else  
        {  
             $message = $validation->error;  
        }  
    } 
  }
}else{
    header("location:admin_login.php");   
}


?>

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>School Site</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Add a Teacher</h3><br />  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
             
                ?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      
                       <div class="form-group">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Teacher Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        </div>

                          <label for="exampleInputEmail1">Teacher Id  </label>
                          <input type="Number" class="form-control" name="id" placeholder="Enter Admission Number">
                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>

                       <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" name="email" placeholder="Enter email">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>

                        <div class="form-check">
                          <label>Gender</label>
                          <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
                          <label class="form-check-label" for="exampleRadios1">
                            Male
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
                          <label class="form-check-label" for="exampleRadios2">
                            Female
                          </label>
                        </div>

                         <div class="form-group">
                          <label >Job Start Date</label>
                          <input type="date" name="job_start_date" max="3000-12-31" min="1000-01-01" class="form-control">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Education</label>
                          <input type="text" class="form-control" name="education" placeholder="Enter Roll No.">
                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Mobile No.</label>
                          <input type="text" class="form-control" name="mobile_no">
                        </div>

                         <div class="form-group">
                          <label for="exampleInputEmail1">Password</label>
                          <input type="password" class="form-control" name="pwd">
                        </div>

                     <input type="submit" name="login" class="btn btn-info" value="Submit" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html> 