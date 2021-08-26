<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
</head>
<meta charset='UTF-8'>
<title> Approval-Requests </title>
<header>

<h1 class="h1 hi" ><center> HELLO,  admin<?=$_SESSION["UID"]?>! <img src="Avatars Set Flat Style-41.png" ></center></h1></div>
<br></br>

<nav>
<center>
		<a class="a navi" href="adminPage.php"> HOME </a> 
		<a class="a navi" href="orgDonation.php"> DONATION </a>
		<a class="a navi" href="orgRequest.php"> REQUESTS </a> 
		<a class="a navi" href="AdminProfile.php"> PROFILE </a> 
		<a class="a navi" href="logout.php"> LOGOUT </a> <br>
</center>
</nav>
</header>
<body>
<main>
<h2> ORGANIZATION REQUESTS </h2>
<p> <center><img class="threat" src="van.png" >
<br>Don't leave them hanging. Accept or reject.</p></center><br>
<table style="width:90%">
	<tr>
		<th class= "table_title"> ID NO. </th>
		<th class= "table_title"> ORGANIZATION NAME </th>
		<th class= "table_title"> ORGANIZATION EMAIL </th>
		<th class= "table_title"> APPROVAL </th>
	</tr>
<?php
$sql = "SELECT * FROM charityrequest order by requestID ASC";
$result= $conn->query($sql);

if ($result->num_rows >0){
while($row = $result->fetch_assoc()){
	
?>
	<tr>	
		<th><?php echo $row["requestID"]; ?> </th>
		<th><?php echo $row["requestName"]; ?> </th>
		<th ><?php echo $row["requestEmail"];?> </th>
		<!--nanti cari cara nk mask nie -->
		<th><button class="button accept" ><a href="accept_action.php?id=<?php echo $row['requestID'] ?>" > ACCEPT </a></button> &nbsp <button class="button reject"> <a href="reject_action.php?id=<?php echo $row['requestID'] ?>"> REJECT </button> </th>
	</tr>
<?php 
}
}
else{

echo "No results";
}
$conn-> close();
?>
</table><br><br>
</main>
</body>
<footer style="font-size: 12px" >Icons made by <a style="font-size: 12px" class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a style="font-size: 12px" class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>