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
	<h2> Interested in volunteering? </h2>
	<p> Below are list of our associated companies that are currently helding an event: </p>

	<table style="width: 60%; margin-left: 4%;">
		<tr>
			<th style="background-color: #ADC2E1; font-size: 16px; font-weight: bold;" class="org2"> Event </th>
			<th style="background-color: #ADC2E1; font-size: 16px; font-weight: bold;" class="org2"> Organisation </th>
			<th style="background-color: #ADC2E1; font-size: 16px; font-weight: bold;" class="org2"> </th>
		</tr>
		<tr>
		<?php
$sql = "SELECT * from event WHERE statusEvent='Y'; ";
$result=$conn->query($sql);
if($result-> num_rows>0){
	while($row= $result->fetch_assoc()){
?>
			<th style="padding: 10px;" class="org2"> <?php echo $row['eventTitle'] ?> </th>
			<th class="org2"> <?php 
			$sql = "SELECT orgName from organisation WHERE orgID = '".$row['orgID']."';";
			$name=$conn->query($sql);
			$rowName= $name->fetch_assoc();
			echo $rowName['orgName'] ?> </th>
			<th class="org2"> <a style="padding: 7px;" class="a1" href="viewEventDetails.php?id=<?php echo $row['eventID'] ?>"> View </th>
		</tr>
		<?php
	}
}
		?>
	</table>
</article>
<br><br>

</main>

</body>
</html>
<footer style="font-size: 12px;"> <i> Copyright &copy GROUP OOMD <i> </footer>
<footer class="attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik,photo3idea</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>