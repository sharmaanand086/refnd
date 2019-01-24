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
                     while($row = $result->fetch_assoc())
                     {
                            $ftime =  $row['ftime'];
                           if( $ftime==0)
                           {
            				$_SESSION["email"] = $semail;
            				echo '1';
                        	}
                        	else
                        	{
                             echo'2';
                           
                           } 
                    }
                   }else{
                       echo'0';
                   }				 
			   
                
                			 
                					
                			 
        
		
}		
	 
?>