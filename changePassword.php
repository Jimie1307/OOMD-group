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
<br><br>
<form action="password_change.php" method="POST">
	<p>Current Password: &nbsp <input type="password" name="pass"> </input>
	<p>New Password: &nbsp <input type="password" name="newPass"> </input>
	<input style=" pointer-events: none; opacity:0;" type="text" name="type" value="1"> </input><br><br>
	<br><br> <input class="button" type="submit" value="Submit"> </input>
</form>
		<br><br>
</form>
</center>
</main>
</body>
</html>