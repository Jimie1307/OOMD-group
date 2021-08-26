<?php
session_start();
include("config.php");

$eventTitle = $_POST["eventTitle"];
$statusEvent= $_POST["statusEvent"];
$eventDesc= $_POST["eventDesc"];
$eventVenue= $_POST["eventVenue"];
$eventDate = $_POST["eventDate"];
$orgID = $_POST["orgID"];

$error= "Title or description (or both) is empty!";

//settle yg bkn image duluan
	$sql = $conn->prepare("INSERT INTO event (eventTitle, eventVenue, eventDesc, orgID, eventDate, statusEvent) VALUES(?,?,?,?,?,?);");
	$sql->bind_param("sssiss", $eventTitle, $eventVenue, $eventDesc, $orgID, $eventDate, $statusEvent );
	$sql->execute();
	if($sql){
		echo "True";	
	}else{
		echo "False";
	}

//image lak., dipetik from dr suraya punya coding
//upload image
$target_dir = "stockImg/";
	if(!empty($_FILES["imgUpload"]["name"])){
	$target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
	}else{
		$target_file = "";
		echo "<h1> No image was uploaded. Successfully updated! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
		echo "<script>setTimeout(\"location.href = 'org_index.php';\",1500);</script>";	
	}
	
clearstatcache();
if(filesize($target_file)){
		//dan bwh nie sume copy paste from previous ones I alrdy edited and did from dr suraya punya 
	$uploadOk = 1;
	$sql=$conn->prepare("UPDATE event SET eventImg = '$target_file' WHERE eventTitle='$eventTitle'; ");
			
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
		
		$imgUp = $sql->execute();
		if ($imgUp) {
			echo "<h1> An image was uploaded. Successfully updated! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
			echo "<script>setTimeout(\"location.href = 'org_index.php';\",1500);</script>";			
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}		
		$conn->close();
        echo "The file ". basename( $_FILES["imgUpload"]["name"]). " has been uploaded.";		
	} else {
        echo "There was an error uploading your file.<br>";
		echo "<script>setTimeout(\"location.href = 'org_index.php';\",1500);</script>";	
    }	
}
}else{
	echo "<h1> No image was uploaded. Successfully updated! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
	echo "<script>setTimeout(\"location.href = 'org_index.php';\",1500);</script>";	
	
}
?>