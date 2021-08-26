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


	<center>
	<h1>Set an Event</h1>
		
		<form action="eventUpdate_action.php" method="POST" enctype="multipart/form-data">
		<label for="orgID"> Company ID: </label>
			<input class="noClick" type ="text" name="orgID" value="<?php echo $_SESSION["UID"]?>" required></br></br>
		Event Title : 
			<input type ="text" name="eventTitle" required></input></br></br>
		Event Venue :
			<textarea rows="2" cols="30" name="eventVenue" maxlength="50" required></textarea></br></br>
		Event Description :
			<textarea rows="1" cols="30"name="eventDesc" maxlength="255" required></textarea></br></br>
		Event Image (if needed):
			<input type ="file" id="imgUpload" name="imgUpload"></input></br></br>
		Event Date :
			<input type ="date" name="eventDate" required></input></br></br>
		Status Event :
			<input id="statusEvent" type ="radio" name="statusEvent" value="Y" checked> Y &nbsp <input id="statusEvent" type ="radio" name="statusEvent" value="N">N </input> </br></br>
			
			<input type="submit" value="ADD EVENT"></input>
		</form>
	</center>
	
	</main>
</body>
</html>