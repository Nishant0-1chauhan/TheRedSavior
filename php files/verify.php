<?php include 'config.php';



	$json = file_get_contents('php://input');
 
	 // decoding the received JSON and store into $obj variable.
	 $obj = json_decode($json,true);
	$name = $obj['name'];
	$mobile = $obj['mobile'];
	
	$image = $obj['image'];
	
	if($obj['mobile']!="")
	{
	
	$result= $con->query("SELECT * FROM verify where mobile='$mobile'");
	
	
		if($result->num_rows>0){
			$add = $con->query("UPDATE verify SET image = '$image', WHERE mobile='$mobile' ");
			
			
			if($add){
				echo  json_encode('will be verified soon'); // alert msg in react native
			}
			else{
			   echo json_encode('check internet connection'); // our query fail 		
			}
				 		
		}
		else
		{		
		   echo json_encode('please select image');  // alert msg in react native	
				
		}
	}
	
	else{
	  echo json_encode('try again');
	}
	
	
?>


