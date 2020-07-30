 <?php  
 include 'server.php';  
 session_start();  

$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


 $data = new Databases;  
 $message = '';  
 if(isset($_POST["login"]))  
 {  
      $field = array(  
           'email' => $email,
           'password' => $password,  
      );  
      if($data->required_validation($field))  
      {  
           if($data->can_login("teachers", $field))  
           {  
                $_SESSION["username"] = $_POST["username"];  
                header("location:teacher.php");
           }  
           else  
           {  
                $message = $data->error;  
           }  
      }  
      else  
      {  
           $message = $data->error;  
      }  
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
                <h3 align="">Login Form in PHP using OOP</h3><br />  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                     <label>Username</label>  
                     <input type="text" name="email" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html> 