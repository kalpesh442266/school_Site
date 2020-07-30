<?php
class Validation{
	
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
}

?>