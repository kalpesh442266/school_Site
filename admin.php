<?php

 session_start();
 header("Cache-Control: no-cache, must-revalidate");
  
include 'server.php';

    if ((isset($_SESSION['isLoggedInOnSchoolWebsite'])) && $_SESSION['isLoggedInOnSchoolWebsite'] == true) {

    }else{
    	header("location:admin_login.php");  	
    }

    $user = new User();

    if (isset($_POST['logout'])) {
    	$user->logout();
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
                <h3 align="">Logged In as Admin</h3><br />  
 
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                     <a href="stud_reg_form.php" class="btn btn-info">
                     	Register Student
                     </a>
                      <a href="teacher_reg_form.php" class="btn btn-info">
                      	Register Teacher
                     </a>

                     <input type="submit" name="logout" class="btn btn-info" value="Logout"/>  
                </form>  
           </div>  
           <br />  
      </body>  
</html>