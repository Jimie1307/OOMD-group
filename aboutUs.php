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
<br><br><br>
<article>
	<p> We are group <div class="flash"> GHOSTBUSTERS </div>
	<p> Our group consists of 5 members: </p>
	<table style="width: 80%; margin-left: 4%;" >
	<tr>
		<th style="background-color: #ADC2E1" class="org"> NAME </th>
		<th style="background-color: #ADC2E1" class="org"> NO MATRICS </th>
	</tr>
	<tr>
		<th class="org2"> BI18110262	</th>
		<th class="org2"> NOOR SYAFIKAH BINTI ABDUL RAHIM </th>
	</tr>
	<tr>
		<th class="org2"> BI18110274	</th>
		<th class="org2"> FATIN FARHANA BINTI MOHD ROSLY </th>
	</tr>
	<tr>
		<th class="org2"> BI18110176</th>
		<th class="org2"> KHAIRUNISA YASMIN BINTI KHAIR</th>
	</tr>
	<tr>
		<th class="org2"> BI18110278	</th>
		<th class="org2"> WAN NORAZLIN BINTI ABDULLAH</th>
	</tr>
		<tr>
		<th class="org2"> BI18110171</th>
		<th class="org2"> NUR-SHARYZA BINTI HENRY RANDANG</th>
	</tr>

	</table>
	<article>
	<p> Our group manages a system that allows a charity management to post events, receive donations from kind donaters and receive volunteering application. Companies are required to apply for application. Once accepted then the companies will have a designated account to run! </p>
	</article>
</article>
<br><br>
</main>
</body>
</html>
<footer style="font-size: 12px;"> <i> Copyright &copy GROUP OOMD <i> </footer>
<footer class="attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik,photo3idea</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>