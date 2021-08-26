<?php
include("config.php");
session_start();


$donorName = $_POST['donorName'];
$donorEmail = $_POST['donorEmail'];
$payAmount = $_POST['paymentAmount'];
$orgName= $_POST['orgName'];

$_SESSION["donorName"] = $donorName;

// retrieve orgID
$sql= "SELECT orgID from organisation WHERE orgName='$orgName'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$orgID= $row['orgID'];

//masuk donor 
$sql = "INSERT INTO donor (donorName,donorEmail, orgID) VALUES ('$donorName','$donorEmail', '$orgID')";
$result=$conn->query($sql);
if($result){
	echo "Donor details has been recorded";

}else{
	echo "There was problem with your donation.";
	
	echo "<script>setTimeout(\"location.href = 'donate.php';\",1500);</script>";
}

//amik donorID
$sql= "SELECT donorID from donor WHERE donorName='$donorName'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$donorID = $row['donorID'];

//masukkan payment
$sql= "INSERT INTO payment(donorID, payAmount, orgID) VALUES ('$donorID', '$payAmount', '$orgID');";
 $result=$conn->query($sql);
if($result){
	echo "<br>Transaction successful! Thank you for donating.";
	echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
}else{
	echo "<br>Transaction unsuccessful!";
	echo "<script>setTimeout(\"location.href = 'donate.php';\",1500);</script>";
	
}


$conn->close();
?>