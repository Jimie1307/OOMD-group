<?php

include("config.php");

if(isset($_POST['submit'])){
	$phonenum=$_POST['phonenum'];
    $email=$_POST['email'];
	$eventID = $_POST['eventID'];
	
//get OrgID through eventID
	$sql="SELECT orgID from event WHERE eventID='$eventID'";
	$result= $conn->query($sql);
	$row=$result->fetch_assoc();
	$orgID = $row['orgID'];
	//insert data into volunteer table
	$sql="INSERT INTO volunteer (volunteerPhone,volunteerEmail,orgID) VALUES ('$phonenum','$email','$orgID')";
	if(mysqli_query($conn,$sql)){
		echo "<h1>Your application has been created successfully</h1>";
		echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";	
	}else{
		echo "Error : " .$sql."".mysqli_error($conn);
	}
	
}
 

?>