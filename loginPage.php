<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>
<title> LOGIN </title>
<head>
<link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
</head>
<center>
<header style="border: 1px solid lightgray;"><h1 class="h1"> LOGIN PAGE </h1> </header>

<body>
<br><br>
<div class= "box">
<img style="width: 25%; height: 25%;" src="hacker.png">

 <form action="login_action.php" method="POST">
 <?php
		if(isset($_SESSION["error"])){
			$error = $_SESSION["error"];
			echo "<br><br><span>$error</span>";
		}
		?>
	<b> <label style="margin-right: auto; margin-left: auto; font-size: 18px;"></label>EMAIL: &nbsp <br><br> <input type= "email" name="userEmail" placeholder="Enter your email"><br><br>
	  <label style="margin-right: auto; margin-left: auto; font-size: 18px;"></label>PASSSWORD:  <br><br><input type= "password" name="userPwd" placeholder="Enter your password">
	  <br><br>
	  <input type= "radio" id="userType" name="userType" value="2"> <label for="admin"> Admin </label> &nbsp <input name="userType" id="userType" type= "radio" value="1" checked> <label for="admin"> Organisation </label> 
	  <br> <br> </b>
	  <input style="background-color: #58709D" class="button" id="submitRegister" type= "submit" value="Submit" placeholder="Submit">
	  <input style="background-color: #58709D" class="button" id="resetRegister" type= "reset" value="Reset" placeholder="Reset">
	
 </form>
<br>
	<a style="text-decoration:underline;" class="a1" href="index.php"> Go back to homepage </a>

</article>
</center>
</body>
</div>
<p style="font-size: 12px;" >Icons made by<a style="font-size: 12px" href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a style="font-size: 12px" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> </p>
</html>

<?php
	unset($_SESSION["error"]);
	?>