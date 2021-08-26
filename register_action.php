<?php
include("config.php");//OOP
?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
<?php
//========================================================================
function validateInput($data, $fieldName) {
    global $errorCount;
	if (empty($data)) {
		displayRequired($fieldName);
		++$errorCount;
		$retval = "";
	} else { // Only clean up the input if it isn't empty
		
		//email validation		
		if($fieldName == "Guest Email"){
			if (!filter_var($data, FILTER_VALIDATE_EMAIL)){
					$errorCount++;
					echo("$data is not a valid email address <br />");
			}
		}
		
		//password validation - length at least 12
	/*	if($fieldName == "Password"){
			echo "Password is $data, Length =" . strlen($data) . " <br />";
		}*/
	
		$retval = trim($data);
		$retval = stripslashes($retval);
	}
	return($retval);
}

function displayRequired($fieldName) {
     echo "The field \"$fieldName\" is required.<br />\n";
}

//============================================================================
//Step 1: Input validation
$errorCount = 0;
$userName = validateInput($_POST['userName'], "Name"); 
$userEmail = validateInput($_POST['userEmail'], "Email"); 
$userPwd = validateInput($_POST['userPwd'], "Password");

if ($errorCount>0) {
     echo "Please use the \"Back\" button to re-enter the 
          data.<br />\n";
}
else {
    //validation ok
	echo "Thank you for filling out the registration form, <b>".$userName."</b>. <br /></br>";
	
//STEP 2: Check if user already exist
	$sql = "SELECT * FROM admin WHERE adminEmail='$userEmail' AND adminPwd='$userPwd' LIMIT 1";	
	$userExist = $conn->query($sql);
	
	if ($userExist->num_rows == 1) {	
		echo "<p><b>Error:</b> Admin Exist, cannot register</p>";		
	} else {
		// User does not exist, insert new user record, hash the password		
		$pwdHash = trim(password_hash($_POST['userPwd'], PASSWORD_DEFAULT)); 
		//echo $pwdHash;
		 if (password_verify('" . $userPwd . "', $pwdHash)){
			echo "<br>True";
		}
		else {
			echo "<br>False<br>";
		} 
		$stmt = $conn->prepare( "INSERT INTO admin (adminID, adminEmail, adminPwd, pwdHash )
		VALUES ( ?, ?, ?, ? )");
		$stmt->bind_param("ssss", $userName, $userEmail, $userPwd, $pwdHash);
		$stmt->execute();
		
		if($stmt){
			echo "<br><h1>New user record created successfully</h1><br>";
			echo "<script>setTimeout(\"location.href = 'loginPage.php';\",1500);</script>";
		}
		else{
			echo "Error: " . $sql . "<br>" . $db_handle->error();
		} 
		
	}
}
$conn->close();
?>

</body>
</html>