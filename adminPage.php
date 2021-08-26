<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
</head>
<meta charset='UTF-8'>
<title> Admin Page </title>
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
<main> <br>
<center><img class="threat" src="van.png" >
<br>Do your job, human.</p></center><br>
<table style="width:90%">
	<tr>
		<th class= "table_title"> ORGANIZATION NAME </th>
		<th class= "table_title"> ORGANIZATION DESCRIPTION </th>
		<th class= "table_title"> ORGANIZATION ADDRESS </th>
		<th class= "table_title"> ORGANIZATION EMAIL </th>
		<th class= "table_title"> ORGANIZATION FAX NUM </th>
	</tr>
<?php
$sql = "SELECT * FROM organisation order by orgID ASC";
$result= $conn->query($sql);
if ($result->num_rows >0){
while($row = $result->fetch_assoc()){
?>
	<tr>	
		<th><?php echo $row["orgName"]; ?> </th>
		<th><?php if(!empty($row["orgDescription"])){echo "Filled in"; }else{echo "Company have not filled in.";}; ?> </th>
		<th><?php echo $row["OrgAddress"];?> </th>
		<th><a style = "font-size: 16px; text-decoration: underline;" href="<?php echo $row["orgEmail"];?>"><?php echo $row["orgEmail"];?></a> </th>
		<th><?php echo $row["OrgFax"];?> </th>
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