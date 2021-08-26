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
<a href="postEvent.php" style="float: right; margin-right: 15%;" class="button"> POST EVENT </a>
<table style="margin-top: 2%; width: 85%;">
			<tr>
				<th> Title </th>
				<th> Venue </th>
				<th> Image</th>
				<th> Date </th>
				<th> Event Status </th>
				<th>  </th>
			</tr>
<?php 
$sql = "SELECT * from event WHERE orgID='".$_SESSION["UID"]."';";
$result=$conn->query($sql);
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		?>
		<tr>
			<th class="title"> <?php echo $row['eventTitle'] ?> </th> 
			<th class="venue"> <?php echo $row['eventVenue'] ?> </th>
			<th class="view"> <?php if( !empty($row['eventImg'])){ echo "Image included";}else{ "No image included"; } ?>   </th>
			<th class="date1"> <?php echo $row['eventDate'] ?>  </th>
			<th> <?php echo $row['statusEvent'] ?> </th>
			<th class="option"> <a class="button" href="editEvent.php?id=<?php echo $row['eventID']?>"> Edit </a> &nbsp <a class="button" href="deleteEvent.php?id=<?php echo $row['eventID']?>"> Delete </a> </th>
		</tr>
		<?php
		
	}
}else{
	echo "<p> You have not posted any events!</p>";
}
?>
</table>
</main>
</body>
</html>