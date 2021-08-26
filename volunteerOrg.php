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

<article>
<br>
<center>
	<table style="text-align: center; margin= 0 auto; margin-top: 2%; width: 65%;">
		<tr>
			<th > VOLUNTEER EMAIL </th>
			<th> VOLUNTEER NUMBER </th>
		</tr>
	<?php  

	$sql = "SELECT * from volunteer WHERE orgID='".$_SESSION["UID"]."';";
	$result = $conn->query($sql);
	if($result-> num_rows >0){
		while($row=$result->fetch_assoc()){
		?>
		<tr>
			<th> <a href= "mailto:<?php echo $row['volunteerEmail'];?> "><?php echo $row['volunteerEmail'];?></a></th>
			<th> <?php echo $row['volunteerPhone'];?> </th>
		</tr>
		<?php
		}
	}else{
		echo '<p style="text-align: center;"> You have no volunteers for now..<p>';
	}
?>
	</table>
</article>
<br><br>
</main>
</body>
</html>
<footer><a target="_blank" href="https://icons8.com/icons/set/non-profit-organisation">Non Profit Organisation icon</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a></footer>