<?php
session_start();
include("config.php");//OOP

//login values from login form
$username = $_POST['userEmail'];
$password = $_POST['userPwd'];
$userType = $_POST['userType'];
$error="Username/password incorrect";
$notExist = "Login error, user simply does not exist!";

if($userType === "1" ){
	$sql = "SELECT * FROM organisation WHERE orgEmail='$username' LIMIT 1";
$login_data = $conn->query($sql);
if ($login_data->num_rows >0) {
	$row = $login_data->fetch_assoc();
	if (password_verify($password,$row['orgHash'])){
	
		echo 'Password Verified!';
		echo "Login success. <br> Thank you for filling out the login form, <b>".$username."</b><br><br>";
		$_SESSION["UID"] = $row["orgID"];//set session userID
		$_SESSION["userName"] = $row["orgName"];
		header("location: org_index.php");
	}else {
	$_SESSION["error"] = $error."<br>";
	header("location: loginPage.php");
	
		}
}
	
}
else if($userType === "2"){
$sql = "SELECT * FROM admin WHERE adminEmail='$username' LIMIT 1";
$login_data = $conn->query($sql);
if ($login_data->num_rows >0) {
	$row = $login_data->fetch_assoc();
	if (password_verify($password,$row['pwdHash'])){
	
		echo 'Password Verified!';
		echo "Login success. <br> Thank you for filling out the login form, <b>".$username."</b><br><br>";
		$_SESSION["UID"] = $row["adminID"];//set session userID
		$_SESSION["userName"] = $row["adminID"];
		header("location: adminPage.php");
	}else {
	$_SESSION["error"] = $error."<br>";
	header("location: loginPage.php");
	
		}
}
}


else{
	$_SESSION["error"] = $notExist;
	header("location: loginPage.php");
}

$conn->close();
?>