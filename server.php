<?php
	$requestName = "";
	$requestEmail = "";
	$ending= '.com';
	$errors = array();

	//connect to database
	include("config.php");
	
	//if register button is clicked
	if(isset($_POST['register'])) {
		$requestName = $_POST['requestName'];
		$requestEmail =$_POST['requestEmail'];
		
	//if email has no .com, add it for them
		if(strpos($requestEmail, $ending) == false){
		$requestEmail = $_POST['requestEmail'].$ending;
	//echo $newEmail;
}
		//if no erros, save application to db 
		if (count($errors) == 0){
			$sql = "INSERT INTO charityrequest (requestName, requestEmail)
							VALUES ('$requestName', '$requestEmail')";
			mysqli_query($conn, $sql);
			
				
		}
	
	echo '<script type="application/javascript">alert("Successfully registered! Application will be reviewed."); window.location.href = "'.$redirectUrl.'";</script>';		
    }

?>