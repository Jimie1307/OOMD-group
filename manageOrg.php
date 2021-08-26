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
</nav>
<body>
<main>
<?php
	$sql = "SELECT orgName, orgEmail, OrgFax, OrgAddress,orgDescription from organisation WHERE orgName='".$_SESSION["userName"]."';";
	$result= $conn->query($sql);
	if($result->num_rows == 1){
		while($row=$result->fetch_assoc()){
?>
	<center>
	<h2> YOUR ORGANIZATION PROFILE </h2>
	<p> Name: <?php echo $row['orgName']?> </p>
	<p> Email: <?php echo $row['orgEmail']?> </p>
	<p> Description: <?php echo $row['orgDescription']?> </p>
	<p> Address: <?php echo $row['OrgAddress']?> </p>
	<p> Fax: <?php echo $row['OrgFax']?> </p>
		<a class="button" href="changeOrg.php"> Update Profile </a>
<?php
		}
	}
?>
	</center>
	<br><br>
	</main>
</body>
</html>