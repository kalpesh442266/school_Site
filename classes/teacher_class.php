<?php
class Teacher{

      public $error;  


      public function add_teacher($teacher_data)  
      {  

            $obj = new DbConnect('127.0.0.1', 'root', '', 'school_site');
            $db = $obj->connect();
           
            $name = $teacher_data['name'];
            $id = $teacher_data['id'];
            $email = $teacher_data['email'];
            $gender = $teacher_data['gender'];
            $jsd = $teacher_data['job_start_date'];
            $education = $teacher_data['education'];
            $contact_no = $teacher_data['mobile_no'];
            $pwd = $teacher_data['password'];	
			      $photo = "photos/file_name.jpeg";
			// $query = "INSERT INTO `students` (`admission_no`, `name`, `photo`, `gender`, `dob`, `roll_no`, `class_name`, `admission_date`, `academic_year`, `email`, `mobile_no`, `parent_name`, `parent_nobile_no`, `parent_email`, `pwd`) VALUES ('2', 'ramukaka', 'photo', 'male', '1999-10-01', '21', '1A', '12-23-34', '2018-19', 'ramukaka@gmail.com', '7895641238', 'shubham', '8596744152', 'shubham@gmail.com', 'ramukaka')";   
			// echo "hello";

   // 			 $st = $db->query($query);


            $stmt = $db->prepare("INSERT INTO teachers (id, name, gender, email, pwd, education, job_start_date, contact_number, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)") or die($db->error);


            $stmt->bind_param("issssssss",  $id, $name, $gender, $email, $pwd, $education, $jsd, $contact_no, $photo) or die($stmt->error);

            $stmt->execute();

  			    $stmt->store_result();

    		    $num_of_rows = $stmt->affected_rows;


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