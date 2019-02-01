<?php
 if(isset($_POST['email']))
{ 
    session_start();
	include("conn.php");
                
                $email = $_POST['email'];
               // echo$email;
 	           	$query = "SELECT * FROM `nuser` WHERE email='$email'";
                $result = $conn->query($query);
                //var_dump($result);
                 if ($result->num_rows > 0) 
                 {
                     //  echo "hello";
                     $query1 = "SELECT * FROM `nuser` WHERE email='$email' AND ftime = 1";
                    $result1 = $conn->query($query1);
                            if ($result1->num_rows > 0) 
                         {
                             echo'2';
                         }else{
                             	echo '1';
                         }
                   }else{
                       echo'0';
                   }				 
			   
                
                			 
                					
                			 
        
		
}		
	 
?>