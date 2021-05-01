<?php include 'config.php';



	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	
	$mobile = $obj['mobile'];
	
	$date=$obj['date'];
	$password=$obj['password'];
	
	if($obj['password']!="" )
	{
	
	$result= $con->query("SELECT * FROM donors where passwd='$password'&& mobile='$mobile'");
	
	
		if($result->num_rows>0){
			$add = $con->query("UPDATE donors SET lastdonated ='$date' WHERE  passwd='$password'");
			
			
			if($add){
				echo  json_encode('User Updated Successfully'); // alert msg in react native
			}
			else{
			   echo json_encode('wrong password'); // our query fail 		
			}
				 		
		}
		else
		{		
		   echo json_encode('please enter correct mobile number and password');  // alert msg in react native	
				
		}
	}
	
	else{
	  echo json_encode('try again');
	}
	
	
?>

