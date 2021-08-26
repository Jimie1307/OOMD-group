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
<?php 
$totalamount = 0.0;
$totalDonor = 0;
//campur nilai semua donation
$sql = "SELECT payAmount,donorID from payment where orgID='".$_SESSION["UID"]."';";
$result=$conn->query($sql);
	if($result-> num_rows > 0){
		while($row=$result->fetch_assoc()){
			$totalamount += $row['payAmount'];
			if(!empty($row['donorID'])){
				$totalDonor++;
			}
			
		}
	}
?>
<article>
<center>
	<h1> DONATION RECEIVED: RM <?php echo $totalamount; ?></h1>
	<h2> TOTAL DONORS:  <?php echo $totalDonor; ?> </h2>
	<div style="text-align: center; border: 1px solid lightgray; background-color: white;" class="notice"> NOTICE: 
	<p style="text-align: center;"> If you have not changed your password, please change. </p>
	</div>
	

</article>
<?php
$conn->close();
?>

</main>
</body>
</html>
<footer><a target="_blank" href="https://icons8.com/icons/set/non-profit-organisation">Non Profit Organisation icon</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a></footer>