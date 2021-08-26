<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
</head>
<meta charset='UTF-8'>
<title> Update Profile </title>
<header>

<h1 class="h1 hi" ><center> HELLO,  admin<?=$_SESSION["UID"]?>! <img src="Avatars Set Flat Style-41.png" ></center></h1></div>
<br></br>

<nav>
<center>
		<a class="a navi" href="adminPage.php"> HOME </a> 
		<a class="a navi" href="orgDonation.php"> DONATION </a>
		<a class="a navi" href="orgRequest.php"> REQUESTS </a> 
		<a class="a navi" href="AdminProfile.php"> PROFILE </a> 
		<a class="a navi" href="logout.php"> LOGOUT </a> <br>
</center>
</nav>
</header>
<body>
<main>
<center>
<?php
$adminID= $_SESSION["UID"];
$sql= "SELECT * from admin WHERE adminID = '".$adminID."';";
$result= $conn->query($sql);
if ($result->num_rows >0){
while($row = $result->fetch_assoc()){

?>
<h2> EDIT PROFILE </h2>
	<form action="edit_action.php" method="POST">
	<p>New Name: <input type="text" name="newID" value="<?php echo $row['adminID']?> "> </input>
	<p>New Email: <input type="text" name="newEmail" value="<?php echo $row['adminEmail']?> ">  </input>
	<p>Password: <input type="password" name="pass"> </input>
	<br><br>
	<input type="submit" value="Submit"> &nbsp <input type="reset" value="Reset"></input>
	</form>
	<br><br>
	<?php
	}
}
	?>
</form>
</main>
</body>
</html>