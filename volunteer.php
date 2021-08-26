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
	<h1 style="margin-left: 4%;">Be A Volunteer Today!</h1>
<p style="margin-left: 4%;">Be a volunteer today to help those in needs as there is a saying :
<br><br>
<i>" Service to others is the rent you pay for your room here on Earth. "</i>
<b>-Muhammad Ali</b>
<br><br>
<i >" You may not have saved a lot of money in your life,but if you have saved a lot of heartaches for other folks,you are a pretty rich man. "</i>
<b>-Seth Parker</b>
<br><br>
<i >" The best way to find yourself is to lose yourself in the service of others. "</i>
<b>-Mahatma Gandhi</b>
<br><br><br>
       
<a href="viewevent.php" class="a1">View Available Events/Organisations</a>
          
</article>
<br><br>

</main>

</body>
</html>
<footer style="font-size: 12px;"> <i> Copyright &copy GROUP OOMD <i> </footer>
<footer class="attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik,photo3idea</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>