<?php
$db_host = "localhost";
$db_username = "syafikah99";
$db_pass = "Ag120140";
$db_name = "truckmanagement";
$conn = mysqli_connect($db_host,$db_username,$db_pass,$db_name) or die ("could not connect to MySQL");

if(isset($_POST['submit-update'])){
	$id = mysqli_real_escape_string($conn, $_POST['dID']);
	$name = mysqli_real_escape_string($conn, $_POST['dName']);
	$pNum = mysqli_real_escape_string($conn, $_POST['dpNum']);
	$mail = mysqli_real_escape_string($conn, $_POST['dEmail']);
	$org = mysqli_real_escape_string($conn, $_POST['orID']);
	
	$sql = "UPDATE DONOR SET donorName='$name', donorPhoneNum='$pNum', donorEmail='$mail', orgID='$org' WHERE donorID='$id';";
	$result = mysqli_query($conn, $sql);
	if($result > 0){
		echo "<script type='text/javascript'>alert('Record updated successfully');
		location = '../index.php?update=success'</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('Error updating record');
		location = '../index.php?update=failed'</script>";
	}
}

else{
	if(isset($_POST['submit-delete'])){
	$tn = mysqli_real_escape_string($conn, $_POST['tn']);
	$sql = "DELETE FROM TRUCK WHERE TRUCK_NUM='$tn';";
	$result = mysqli_query($conn, $sql);
	if($result > 0)
		echo "<script type='text/javascript'>alert('Record deleted successfully');
	location = '../index.php?delete=success'</script>";
	else
		echo "<script type='text/javascript'>alert('Error deleting record');
	location = '../index.php?delete=failed'</script>";
	}
}

?>