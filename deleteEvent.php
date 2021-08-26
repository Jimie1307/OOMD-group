<?php 
include("config.php");

$eventID= $_GET["id"];
$sql= "DELETE FROM event WHERE eventID = '$eventID'";
$result=$conn->query($sql);

	if($result){
		echo "Post deleted successfully";
		echo "<script>setTimeout(\"location.href = 'eventOrg.php';\",1000);</script>";
	}else{
		echo "Post is not deleted. There is a problem.";
		echo "<script>setTimeout(\"location.href = 'eventOrg.php';\",1000);</script>";
	}
	
	?>