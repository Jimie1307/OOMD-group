<?php
//Connect with MYSQL
	include("config.php");
	
	//list out all the variables
	$actType= $_POST["type"];

	if($actType == "1"){
	//UPDATE Query
	$sql = "UPDATE organisation SET orgEmail='$_POST[orgEmail]', OrgFax = '$_POST[OrgFax]' ,OrgAddress='$_POST[OrgAddress]', orgDescription='$_POST[OrgDescription]' WHERE orgID =$_POST[orgID]";
	//Execute the query
	if (mysqli_query ($conn,$sql))
		header("refresh:1; url=org_index.php");
	else 
		echo "Data Not Updated";
	}
	
if($actType == "2"){
	//list all the stuff needed to input
	$eventID = $_POST['eventID'];
	$eventTitle= $_POST['eventTitle'];
	$eventVenue= $_POST['eventVenue'];
	$eventDate= $_POST['eventDate'];
	$statusEvent= $_POST['statusEvent'];
	$eventDesc= $_POST['eventDesc'];
	
	
	$sql = $conn->prepare("UPDATE event SET eventTitle=?, eventVenue=?, eventDesc=?, eventDate=?, statusEvent=? WHERE eventID='$eventID'; ");
	$sql->bind_param("sssss", $eventTitle, $eventVenue, $eventDesc, $eventDate, $statusEvent);
	$sql->execute();
	
	if($sql){
		echo "Successfully updated!";
	}else{
		echo "Appears that there is a problem!";
	}
	
	//check file wujud ke tak
	//this is for file
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
	
	$sql=$conn->prepare("UPDATE event SET eventImg = '$target_file' WHERE eventID='$eventID'; ");
			
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
}
	
	}else{
		echo "";
		
	}

?>