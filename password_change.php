<?php
session_start();
include("config.php");//OOP

$adminID= $_SESSION["UID"];
$type = $_POST['type'];


if($type==="1"){
	$currPwd = $_POST['pass'];
	$newPwd = $_POST['newPass'];
	$pwdHash = trim(password_hash($_POST['newPass'], PASSWORD_DEFAULT)); 
//tgk current password tu match x then baru tukor
$sql = "SELECT pwdHash from admin WHERE adminID='$adminID' LIMIT 1;";
$result= $conn->query($sql);
$row= $result->fetch_assoc();

if(password_verify($currPwd,$row['pwdHash'])){
	echo "Match<br>";
	echo $userName;

	$pwdHash = trim(password_hash($newPwd, PASSWORD_DEFAULT)); 
	$updatePwd= $conn->prepare("UPDATE admin SET adminPwd = ?, pwdHash = ? WHERE adminID='$adminID';");
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
}

if($type==="2"){
	
	$error = "Wrong email";
	$givenEmail = $_POST['givenEmail'];
	$newPwd = $_POST['newPass'];
	$pwdHash = trim(password_hash($_POST['newPass'], PASSWORD_DEFAULT)); 
	
	$sql = "SELECT adminEmail from admin WHERE adminID='$adminID' LIMIT 1;";
	$result= $conn->query($sql);
	$row= $result->fetch_assoc();
	$userEmail = $row['adminEmail'];
	if(strcmp($givenEmail,$userEmail)){
		$sql= "UPDATE admin SET adminPwd = '$newPwd', pwdHash = '$pwdHash' WHERE adminID='$adminID';";
		$result= $conn->query($sql);
			if($result){
				echo "<br> Successfully changed password!<br> Please login back!...";
			echo "<script>setTimeout(\"location.href = 'logout.php';\",1000);</script>";
			}else{
			echo "<br> There was a problem in changing password. Please login back and try again later.<br>";
			echo "<script>setTimeout(\"location.href = 'logout.php';\",1000);</script>";
		}
	}else{
			$_SESSION['error']=$error;
			echo '<a href="forgotPassword.php"> Go back </a>';
		}
	
	
}
$conn->close();
?>