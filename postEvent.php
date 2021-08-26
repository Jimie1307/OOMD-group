<?php 

session_start();
include("config.php");

?>
<meta charset='UTF-8'>
<html> 
<title> ORGANISATION HOMEPAGE </title>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="organisation.css?v=<?php echo time(); ?>">
</head>

<header> 
<img class='icon' src='org.png'></img>
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

<form style="margin-left: 30%;" action="eventUpdate_action.php" method="POST" enctype="multipart/form-data">
		<br>
	<label for="orgID"> Organization ID: <input class="noClick" type="text" name="orgID" value=<?php echo $_SESSION["UID"] ?> ></input> </label>
		<br><br>
		
	<label for="title">Title:</label>
	<input  type="type" name="eventTitle"  required></input><br>
	<br>
	
	<label for="text">Date: </label><br>
	<input  type="date" name="eventDate"  required></textarea>
		<br><br>
		
	<label for="text">Venue: </label><br>
	<input  type="text" name="eventVenue" required></textarea>
		<br><br>
		
	<label for="img">Update image (if needed):</label>
	<input  type="file" name="imgUpload" ></input>
		<br><br><br>
		
	<label> Status Event : </label><input type="radio" name="statusEvent" value="Y" >Y</input>
	</input>&nbsp <input type="radio" name="statusEvent" value="N" checked>N</input>
		<br><br>
		
	<label for="text">Description: </label><br>
	<textarea  rows="4" cols="70" name="eventDesc" required></textarea>
		<br><br>
	
	<center>
	<input class="input button1" type="submit" value="Submit" >&nbsp <input class="input button1"  type="reset" value="Reset" ></input> <br>
	<br>
</form>

</main>
</body>
</html>
<footer><a target="_blank" href="https://icons8.com/icons/set/non-profit-organisation">Non Profit Organisation icon</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a></footer>