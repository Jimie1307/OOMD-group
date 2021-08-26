<?php
include("config.php");
session_start();
?>
<html> 
<title> ORGANISATION HOMEPAGE </title>
<meta charset='UTF-8'>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="organisation.css?v=<?php echo time(); ?>">
</head>

<header> 
<?php if(isset($_SESSION["userName"])){

echo "<h1>Welcome,".$_SESSION["userName"]."</h1>";}else{ echo "<h1>Welcome, hackers</h1>";}?> 
</header>

<nav> 
	<a class="a1" href="org_index.php"> HOME </a>&nbsp
	<a class="a1" href="manageOrg.php"> PROFILE </a>&nbsp
	<a class="a1" href="eventOrg.php"> EVENT </a>&nbsp
	<a class="a1" href="volunteerOrg.php"> VOLUNTEERS </a>&nbsp
	<a class="a1" href="logout.php"> LOGOUT </a>&nbsp
</nav>
<body>
<main>
<br><br>

<form action="changePwd_action.php" method="POST" style="margin-left: 20%;">
<label for="curPass"> Current Password: </label>&nbsp 
<input name="currPwd" type="password" placeholder="********" required></input><br><br>
<label> New Password: </label>&nbsp <input type= "password" name="newPwd" placeholder="********" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{0,12}" title= "Must contain at least: one number, one uppercase, one lowercase. Not more than 12 characters!" required>
<br><br>

<input style="margin-left: 30%;" class="a button" type="submit" value="Submit"> &nbsp <a class="button" href="AdminProfile.php"> Cancel </a>
</form>


</main>
</body>
</html>