<?php include 'config.php';



	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	
	$mobile = $obj['mobile'];
	$lat = $obj['lat'];
	$lng = $obj['lng'];
	$password=$obj['password'];
	
	if($obj['mobile']!="")
	{
	
	$result= $con->query("SELECT * FROM donors where mobile='$mobile' && passwd='$password'");
	
	
		if($result->num_rows>0){
			$add = $con->query("UPDATE donors SET lat = '$lat', lng = '$lng' WHERE mobile='$mobile'");
			
			
			if($add){
				echo  json_encode('User Updated Successfully'); // alert msg in react native
			}
			else{
			   echo json_encode('check internet connection'); // our query fail 		
			}
				 		
		}
		else
		{		
		   echo json_encode('please register first or may be you have entered wrong mobile number or password');  // alert msg in react native	
				
		}
	}
	
	else{
	  echo json_encode('try again');
	}
	
	
?>


