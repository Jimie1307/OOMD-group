<?php 

session_start();
include("config.php");

?>
<meta charset='UTF-8'>
<html> 
<title> CHARITY ORGANISATION MANAGEMENT </title>
<head> 
<link rel="stylesheet" href="charity.css?v=<?php echo time(); ?>">
</head>

<header> 
<div class="logo"> <img class="ImgLogo" src="help.png"></img> </div>
<nav> 
	<a class="navi" href="index.php" > HOME </a>&nbsp
	<a class="navi" href="aboutUs.php" > ABOUT US </a>&nbsp
	<a class="navi" href="donate.php" > DONATE </a>&nbsp
	<a class="navi" href="volunteer.php" > VOLUNTEER </a>&nbsp
	<a class="navi" href="organisation.php" > ORGANISATION </a>&nbsp
	<a class="navi" href="contact.php" > CONTACT </a>
</nav></header>
<img class="slide" src="stockImg\givehelp.jpg"></img>
<div class="divider"> </div>

<body>
<main style="float: left;">
<div class="login" style=" z-index: 1; margin-top: 2%; float:right;">
	 <a class="a1" href="loginPage.php"> Member Login </a><br>
	<a class="a1" href="org_request.php"> Want to join us? </a>
</div>
<br><br>
<article>
		<?php
		$eventID= $_GET['id'];
$sql = "SELECT * from event WHERE eventID='$eventID'; ";
$result=$conn->query($sql);
if($result-> num_rows>0){
	while($row= $result->fetch_assoc()){
?>			
			<h2 style="text-align: center;"> <?php echo $row['eventTitle'];?> </h2>
			<section style="background-color: white; ">
			<?php if(!empty($row['eventImg'])){
			echo '<img class="event" src="'.$row['eventImg'].'"<br>';}
			else{echo ""; } ?>
			<br>
			<p class="event-details"> <?php echo $row['eventDesc']?></p>
			</section><br><center>
			<h3 style="text-align:center; "> Details of the event are below: </h3>
			<label style=" font-size: 20px; " for="venue"> Venue: <?php echo $row['eventVenue']?></label> 
			<br>
			<label style="font-size: 20px; " for="date"> Event date: <?php echo $row['eventDate']?></label> 
			<br>
			<label style="font-size: 20px; " for="organiser"> Organised by: 
			<?php $orgID= $row['orgID'];
			$sql= "SELECT orgName from organisation WHERE orgID='$orgID'";
			$result=$conn->query($sql);
			$row=$result->fetch_assoc();
			echo $row['orgName'];
			?> </label>
			</center>
		<?php
	}
}
		?>

</article>
<br><br>
<a style=" font-size: 20px; text-align: center; margin-left: 44.5%;" class="a1" href="apply_volunteer.php?id=<?php echo $eventID?>"> I VOLUNTEER </a>
<br><br><br>

</main>

</body>
</html>
<footer style="font-size: 12px;"> <i> Copyright &copy GROUP OOMD <i> </footer>
<footer class="attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik,photo3idea</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>