<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
</head>
<meta charset='UTF-8'>
<title> Admin Profile </title>
<header>

<h1 class="h1 hi" ><center> HELLO, admin<?=$_SESSION["UID"]?>! <img src="Avatars Set Flat Style-41.png" ></center></h1></div>
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
<?php 
$adminID= $_SESSION["UID"];
$sql= "SELECT * from admin WHERE adminID = '".$adminID."';";
$result= $conn->query($sql);
if ($result->num_rows >0){
while($row = $result->fetch_assoc()){
?>
<br>
<center>
<p> <center><img class="threat" src="van.png" >
<br><a style="text-decoration: underline;" href="editProfile.php">Edit your profile here.</a></center><br>

 <p> Current Name:&nbsp <?php echo $row['adminID']?></p> 
 <p> Current Email:&nbsp <?php echo $row['adminEmail']?></p>
  <p> Current Password:&nbsp <b>[You don't remember meh??] </b></p>
 <br>
	<a class="button" style="color: white;" href="changePassword.php"> Change password?</a>
	<a class="button" style="color: white;" href="forgotPassword.php"> Forgot password?</a>
<?php 
}
}else{
	echo "<br> Error occured. Could not find user.<br>";
	header("location: logout.php");
}
 
?>
</center>
<br><br>
</main>
</body>
<footer style="font-size: 12px" >Icons made by <a style="font-size: 12px" class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a style="font-size: 12px" class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>