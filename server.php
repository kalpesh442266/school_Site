 <?php   
 //database.php  
class DbConnect
{
    /**
     * @var string
     */
    protected $host = null;

    /**
     * @var string
     */
    protected $username = null;

    /**
     * @var string
     */
    protected $pass = null;//null for no pass

    /**
     * @var string
     */
    protected $dbName = null;

    /**
     * @var mysqli
     */
    protected $conn = null;

    public function __construct($host, $user, $pass = null, $db = null)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbName = $db;
    }

    function connect(){
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->dbName);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

}
class User{ 
      public $error;  

      public function required_validation($field)  
      {  
           $count = 0;  
           foreach($field as $key => $value)  
           {  
                if(empty($value))  
                {  
                     $count++;  
                     $this->error .= "<p>" . $key . " is required</p>";  
                }  
           }  
           if($count == 0)  
           {  
                return true;  
           }  
      } 


      public function can_login($table_name, $where_condition)  
      {  

            $obj = new DbConnect('127.0.0.1', 'root', '', 'school_site');
            $db = $obj->connect();
       
           $email = $where_condition['email'];
           $pwd = $where_condition['password'];
    
      
            $query = "SELECT * FROM $table_name WHERE  email=? AND password=?"; // SQL with parameters
            // $student = "SELECT * FROM students WHERE  email=? AND password=?"; // SQL with parameters
            // $teacher = "SELECT * FROM teacher WHERE  email=? AND password=?"; // SQL with parameters



            $stmt = $db->prepare($query);
            $stmt->bind_param("ss", $email, $pwd);  
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $user = $result->fetch_assoc();

            $_SESSION['isLoggedInOnSchoolWebsite'] = false;

           if(mysqli_num_rows($result))
           {  
            // echo "loggedIn";
            // consolw
                $_SESSION['isLoggedInOnSchoolWebsite'] = true;
                $_SESSION['username'] = $user['name'];
                return true;

           }  
           else  
           {  
                $this->error = "invalid email or password";  
           }  

           // $stmt->close();
      }

      public function logout(){
        $_SESSION['isLoggedInOnSchoolWebsite'] = false;
        session_start(); //to ensure you are using same session
        session_destroy(); //destroy the session
        header("location:/school_site/admin_login.php");
      }       
 }  
 ?>