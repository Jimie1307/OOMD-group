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
<br><br>
<?php 
$eventID = $_GET["id"];

$sql = "SELECT * from event WHERE eventID= '$eventID';";
$result=$conn->query($sql);
if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$showContent = $row['statusEvent'];
			$opp;
		 ?>
		<form style="margin-left: 30%;" action="orgUpdate_action.php" method="POST" enctype="multipart/form-data">
		<input class="unclickable" style="opacity: 0;" type="text" name="type" value="2" ></input>
		<br>
	<label for="contentID"> Event ID: <input class="noClick" type="text" name="eventID" value=<?php echo $eventID ?> ></input> </label>
		<br><br>
		
	<label for="title">Title:</label>
	<input  type="type" name="eventTitle" value= "<?php echo $row['eventTitle'];?>" required></input><br>
	<br>
	
	<label for="text">Date: </label>
	<input  type="date" name="eventDate" value="<?php echo $row['eventDate'];?>" required></textarea>
		<br><br>
		
	<label for="text">Venue: </label>
	<input  type="text" name="eventVenue" value="<?php echo $row['eventVenue'];?>" required></textarea>
		<br><br>
		<img style=" width: 20%; height: 20%;" src="<?php echo $row['eventImg'];?>"></img>
		<br>
	<?php if(!empty($row['eventImg'])){
		echo $row['eventImg'] ;
	}
	else{
		echo "<p> No image selected </p>";
	}
	?></img>
		<br>
		
	<label for="img">Update image (if needed):</label>
	<input  type="file" name="imgUpload" ></input>
		<br>
		<?php 
		if($showContent == "Y"){
			$opp = "N";
		}else{
		 $opp = "Y"; } ?>
		 <br><br>
	<label> Status Event : </label><input type="radio" name="statusEvent" value="<?php echo $statusEvent; ?>" checked> <?php echo $showContent; ?></input>
	
		</input>&nbsp <input type="radio" name="statusEvent" value="<?php echo $opp; ?>"><?php echo $opp; ?></input>
		<br><br>
		
	<label for="text">Description: </label><br>
	<textarea  rows="4" cols="70" name="eventDesc" required><?php echo $row['eventDesc'];?></textarea>
		<br><br>
	
	<center>
	<input class="input button1" type="submit" value="Submit" >&nbsp <input class="input button1"  type="reset" value="Reset" ></input> <br>
	<br>
</form>

<?php
		}
}else{
	
	echo "There is error in showing content. Try again later";
}
?>
</main>
</body>
</html>