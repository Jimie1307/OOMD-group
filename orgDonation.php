<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
</head>

<title> Organization List </title>
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
</center>
</header>
<main> <br>
<center><img class="threat" src="van.png" >
<br>Ahhh humanity restored I guess</p></center><br>
<center>
<h3> CHOOSE ORGANISATION TO VIEW DONATION INFO </h3><br>
<form action="searchDonation.php" method="POST"> 
<select name="orgName" id="orgName">
	<option value="0"> Choose organisation </option>
<?php 

	$sql= "SELECT orgName from organisation ";
	$result=$conn->query($sql);
		if($result-> num_rows > 0){
			while($row=$result->fetch_assoc()){
				
				?>
			<option name="orgName" value="<?php echo $row['orgName']?>"><?php echo $row['orgName']?> </option>
				<?php
			}
			
		}
			
		?>	
		</select>
		<br><br>
		<input class="button" type="submit" value="Submit"></input>
		</form>
		<br>
</main>
</center>
</body>
<footer style="font-size: 12px" >Icons made by <a style="font-size: 12px" class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a style="font-size: 12px" class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>