<?php
session_start();
include("config.php");

$currPwd = $_POST['currPwd'];
$newPwd = $_POST['newPwd'];
$userName= $_SESSION["userName"];
//check currPwd tu betul x
$sql= "SELECT orgHash from organisation WHERE orgName='".$_SESSION["userName"]."';";
$result=$conn->query($sql);
$row= $result->fetch_assoc();

if(password_verify($currPwd,$row['orgHash'])){
	echo "Match<br>";
	echo $userName;

	$pwdHash = trim(password_hash($newPwd, PASSWORD_DEFAULT)); 
	$updatePwd= $conn->prepare("UPDATE organisation SET orgPwd= ?, orgHash=? WHERE orgName= '$userName' ;");
	$updatePwd->bind_param("ss", $newPwd, $pwdHash);
	$updatePwd->execute();
		if($updatePwd){
			echo "<br> Successfully changed password!<br> Please login back!...";
			echo "<script>setTimeout(\"location.href = 'logout.php';\",1000);</script>";
			
		}else{
			echo "<br> There was a problem in changing password. Please login back and try again later.<br>";
			echo "<script>setTimeout(\"location.href = 'logout.php';\",1000);</script>";
		}
}else{
	echo "Password does not match";
	
}

?>