<?php
session_start();
include("config.php");

$adminID = $_SESSION["UID"];
$newID = $_POST['newID'];
$newEmail = $_POST['newEmail'];
$pass = $_POST['pass'];
$invalid = "Invalid password!";

//tgk dulu password betul x then baru buat
$sql = "SELECT pwdHash from admin WHERE adminID='$adminID' LIMIT 1;";
$result= $conn->query($sql);
if ($result->num_rows >0){
while($row = $result->fetch_assoc()){
	if(password_verify($pass, $row['pwdHash'])){
		echo "Password matched";
		$sql = $conn->prepare("UPDATE admin SET adminID = ?, adminEmail = ? WHERE adminID='$adminID';");
		$sql->bind_param("ss", $newID, $newEmail);
		$sql->execute();
		
		if($sql){
			echo "<h1> Successfully updated! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
			echo "<script>setTimeout(\"location.href = 'AdminProfile.php';\",1500);</script>";
		}else{
			error_log("Something went wrong! Failed to update info :(",0);
			echo "<script>setTimeout(\"location.href = 'AdminProfile.php';\",1500);</script>";
		}
	
	}else{
		$_SESSION['error']= $invalid;
		header("location: editProfile.php");
	}
}
}

$conn->close();
?>
