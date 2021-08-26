<?php 

session_start();
include("config.php");

?>
<meta charset='UTF-8'>
<html> 
<title> CHARITY ORGANISATION MANAGEMENT </title>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<main style=" z-index: 1; margin-top: 2%; float:right;">

<div class="login" style="float:right;">
	 <a class="a1" href="loginPage.php"> Member Login </a><br>
	<a class="a1" href="org_request.php"> Want to join us? </a>
</div>
<br><br><br>

<h2> LIST OF ASSOCIATED ORGANISATIONS </h2>
<br><br><br><br>
<article>
	<table class="org" style="width= 60%; margin-right: 5%;">
		<tr>
			<th style="background-color: #ADC2E1; font-size: 16px; font-weight: bold;" class="org2" > NAME </th> 
			<th style="background-color: #ADC2E1; font-size: 16px; font-weight: bold;" class="org2"> WHAT DO THEY DO? </th>
			<th style="background-color: #ADC2E1; font-size: 16px; font-weight: bold;" class="org2"> CONTACT </th>
		</tr>
<?php 
	$sql="SELECT * from organisation WHERE orgDescription IS NOT NULL ";
	$result=$conn->query($sql);
	if($result->num_rows>0){
	while($row= $result->fetch_assoc()){
?>
		<tr>
			<th class="org2"> <?php echo $row['orgName'];?> </th><br>
			<th class="org2"> <?php echo $row['orgDescription'];?> </th><br>
			<th class="org2"> <?php echo $row['OrgAddress']."<br>".$row['orgEmail']."<br>".$row['OrgFax'] ;?> </th>
		
		<?php
	}
}
?>
		
		</tr>
	</table>
	<br><br>
	
</article>
</main>
</body>
</html>
<footer style="font-size: 12px;"> <i> Copyright &copy GROUP OOMD <i> </footer>
<footer class="attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik,photo3idea</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>