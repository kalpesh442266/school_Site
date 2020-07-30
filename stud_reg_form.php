<?php

session_start();
include 'server.php';
include 'classes/student_class.php';
include 'classes/validation.php'; 

header("Cache-Control: no-cache, must-revalidate");
  

function test_input($data) {
	$data = trim($data);  
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ((isset($_SESSION['isLoggedInOnSchoolWebsite'])) && $_SESSION['isLoggedInOnSchoolWebsite'] == true) {

	    
	$name = $admission_no = $email = $gender = $dob = $roll_no = $class_name = $ad_date = $academic_year = $mobile_no = $parent_name = $parent_Mobile_no = $parent_email = $password = "";



	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	  $name = test_input($_POST["name"]);
	  $admission_no = test_input($_POST["admission_no"]);
	  $email = test_input($_POST["email"]);
	  $gender = test_input($_POST["gender"]);
	  $dob = test_input($_POST["dob"]);
	  $roll_no = test_input($_POST["roll_no"]);
	  $class_name = test_input($_POST["class_name"]);
	  $ad_date = test_input($_POST["admission_date"]);
	  $academic_year = test_input($_POST["academic_year"]);
	  $mobile_no = test_input($_POST["mobile_no"]);
	  $parent_name = test_input($_POST["parent_name"]);
	  $parent_Mobile_no = test_input($_POST["parent_Mobile_no"]);
	  $parent_email = test_input($_POST["parent_email"]);
	  $password = test_input($_POST["pwd"]);
	




		$student = new Student;  
    $validation = new Validation();
		$message = '';

		if(isset($_POST["login"]))  
		{  
	      $field = array(  
		  	   'name'=> $name,
	   	  	   'admission_no'=> $admission_no,
		       'email' => $email,
		       'gender' => $gender,
		       'dob' => $dob,
		       'roll_no' => $roll_no,
		       'class_name' => $class_name,
		       'admission_date' => $ad_date,
		       'academic_year' => $academic_year,
		       'mobile_no' => $mobile_no,
		       'parent_name' => $parent_name,
		       'parent_Mobile_no' => $parent_Mobile_no,
		       'parent_email' => $parent_email,
		       'password' => $password,  
	      );  
	      // $student->add_student($field);
	      if($validation->required_validation($field))  
	      {  
	           if($student->add_student($field))
	           {  

	           	    $message = "student entered successfully";  

	                // $_SESSION["username"] = $_POST["username"];
	                  // header("location:admin.php");  
	                
	           }
	           else  
	           {  
	                $message = $student->error;  
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
           <title>Webslesson Tutorial | Login Form in PHP using OOP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">Add a Student</h3><br />  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
             
                ?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      
                       <div class="form-group">
                       	 <div class="form-group">
                          <label for="exampleInputEmail1">Student Name</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        </div>

                          <label for="exampleInputEmail1">Admission Number	</label>
                          <input type="text" class="form-control" name="admission_no" placeholder="Enter Admission Number">
                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>

                       <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" name="email" placeholder="Enter email">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        
					  <!--   <div class="form-group">
					    	<label for="exampleFormControlFile1">Photo</label>
					    	<input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
					  	</div> -->

                        <div class="form-check">
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
						 	<label >Select Date of Birth</label>
						 	<input type="date" name="dob" max="3000-12-31" min="1000-01-01" class="form-control">
						</div>

						<div class="form-group">
                          <label for="exampleInputEmail1">Roll No</label>
                          <input type="text" class="form-control" name="roll_no" placeholder="Enter Roll No.">
                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Class Name</label>
                          <input type="text" class="form-control" name="class_name" placeholder="Enter Class Name">
                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>

                         <div class="form-group">
						 	<label >Admission Date</label>
						 	<input type="date" name="admission_date" max="3000-12-31" min="1000-01-01" class="form-control">
						</div>

 						<div class="form-group">
                          <label for="exampleInputEmail1">Academin Year</label>
                          <input type="text" class="form-control" name="academic_year">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Mobile No.</label>
                          <input type="text" class="form-control" name="mobile_no">
                        </div>

	                    <div class="form-group">
                          <label for="exampleInputEmail1">Parent Name</label>
                          <input type="text" class="form-control" name="parent_name">
                        </div>


	                    <div class="form-group">
                          <label for="exampleInputEmail1">Parent Mbile No.</label>
                          <input type="text" class="form-control" name="parent_Mobile_no">
                        </div>

						<div class="form-group">
                          <label for="exampleInputEmail1">Parent Email address</label>
                          <input type="email" class="form-control" name="parent_email" placeholder="Enter email">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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