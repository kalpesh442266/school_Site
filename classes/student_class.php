<?php
class Student{

      public $error;  

      public function required_validation($field)  
      {  
      	// echo "$field";
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


      public function add_student($stud_data)  
      {  

            $obj = new DbConnect('127.0.0.1', 'root', '', 'school_site');
            $db = $obj->connect();
           
            $name = $stud_data['name'];
            $admission_no = $stud_data['admission_no'];
            $email = $stud_data['email'];
            $gender = $stud_data['gender'];
            $dob = $stud_data['dob'];
            $roll_no = $stud_data['roll_no'];
            $class_name = $stud_data['class_name'];
            $admission_date = $stud_data['admission_date'];
            $academic_year = $stud_data['academic_year'];
            $mobile_no = $stud_data['mobile_no'];
            $parent_name = $stud_data['parent_name'];
            $parent_mobile_no = $stud_data['parent_Mobile_no'];
            $parent_email = $stud_data['parent_email'];
            $pwd = $stud_data['password'];		
			$photo = "photos/file_name.jpeg";
			// $query = "INSERT INTO `students` (`admission_no`, `name`, `photo`, `gender`, `dob`, `roll_no`, `class_name`, `admission_date`, `academic_year`, `email`, `mobile_no`, `parent_name`, `parent_nobile_no`, `parent_email`, `pwd`) VALUES ('2', 'ramukaka', 'photo', 'male', '1999-10-01', '21', '1A', '12-23-34', '2018-19', 'ramukaka@gmail.com', '7895641238', 'shubham', '8596744152', 'shubham@gmail.com', 'ramukaka')";   
			// echo "hello";

   // 			 $st = $db->query($query);


            $stmt = $db->prepare("INSERT INTO students (admission_no, name, photo, gender, dob, roll_no, class_name, admission_date, academic_year, email, mobile_no, parent_name, parent_mobile_no, parent_email, pwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") or die($db->error);


            $stmt->bind_param("sssssssssssssss",  $admission_no, $name, $photo, $gender, $dob, $roll_no, $class_name, $admission_date, $academic_year, $email, $mobile_no, $parent_name, $parent_mobile_no, $parent_email, $pwd) or die($stmt->error);

			// echo "$stmt <br>";
            $stmt->execute();


			// if (!$stmt->execute()) {
			// 	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			// }
			// $result = $stmt->get_result();
			$stmt->store_result();

		   $num_of_rows = $stmt->affected_rows;

		    // echo "$num_of_rows";

           if($num_of_rows)
           {  
                return true;

           }  
           else  
           {  
                $this->error = "error";  
           }

    	}

}
?>