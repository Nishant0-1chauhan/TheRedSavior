<?php include 'config.php';








	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	 
	 // name store into $name.
	$name = $obj['name'];
	 
	// same with $email.
	$pincode = $obj['pincode'];
	$password=$obj['password'];
	$password1=$obj['password1'];
	// same with $password.
	$bgroup = $obj['bgroup'];
	$age = $obj['age'];
	$mobile = $obj['mobile'];
	$lat = $obj['lat'];
	$lng = $obj['lng'];
	
	if($obj['mobile']!=""&& $password==$password1)
	{
	
	$result= $con->query("SELECT * FROM donors where mobile='$mobile'");
	
	
		if($result->num_rows>0){
			echo json_encode('number already exist');  // alert msg in react native		 		
		}
		else
		{		
		   $add = $con->query("insert into donors (username,pincode,bgroup,age,mobile,lat,lng,passwd) values('$name','$pincode','$bgroup','$age','$mobile','$lat','$lng','$password')");
			
			if($add){
				echo  json_encode('User Registered Successfully'); // alert msg in react native
			}
			else{
			   echo json_encode('check internet connection'); // our query fail 		
			}
				
		}
	}
	
	else{
	  echo json_encode('try again or wrong password');
	}
	
	
?>

