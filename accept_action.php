<?php
include("config.php");//OOP

$reqID = $_GET['id'];
//get request company name and email
$sql= "SELECT requestName, requestEmail from charityrequest WHERE requestID= '".$reqID."';";
$result = $conn->query($sql);
$reqName; 
$reqEmail;
if ($result->num_rows >0){
while($row = $result->fetch_assoc()){
	//echo $row["requestName"];
	//echo "<br>".$row["requestEmail"];
	$reqName = $row["requestName"];
	$reqEmail = $row["requestEmail"];
}
}
//baru masukkan dlm organisation table
$dummyPwd= "patBoneka".rand(10,100);
$pwdHash = trim(password_hash($dummyPwd, PASSWORD_DEFAULT)); 
$stmt = $conn->prepare("INSERT INTO organisation(orgName, orgEmail, orgPwd, orgHash) VALUES( ?, ? ,?,? )");
$stmt->bind_param("ssss", $reqName, $reqEmail, $dummyPwd , $pwdHash );
$stmt->execute();

$stmt = $conn->prepare("DELETE FROM charityrequest WHERE requestName= '".$reqName."';");
$stmt->execute();

if(!$stmt){
	error_log("Something went wrong!",0);
	echo "<script>setTimeout(\"location.href = 'orgRequest.php';\",1500);</script>";
}else{
	echo "<h1> Successfully added! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
	echo "<script>setTimeout(\"location.href = 'orgRequest.php';\",1500);</script>";
}	

$conn->close();
?>






















?>

