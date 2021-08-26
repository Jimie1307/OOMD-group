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

	<center>
	<h1>Manage Your Profile</h1>
<?php
	$sql = "SELECT orgName, orgEmail, OrgFax, OrgAddress,orgDescription from organisation WHERE orgName='".$_SESSION["userName"]."';";
	$result= $conn->query($sql);
	if($result->num_rows == 1){
		while($row=$result->fetch_assoc()){
?>
		<form action="orgUpdate_action.php" method="post">
		<input class="noClick" style="opacity: 0;" type ="text" name="type" value="1" required><br>
		<label for="orgID"> Company ID: </label>
			<input class="noClick" type ="text" name="orgID" value="<?php echo $_SESSION["UID"]?>" required></br></br>
		<label for="orgID"> Company Email: </label>
			<input type ="text" name="orgEmail" value="<?php echo $row['orgEmail']?>" required></br></br>
		<label for="orgAddress"> Company Description : </label>
			<textarea rows="1" cols="30"name="OrgDescription" maxlength="255" required><?php echo $row['orgDescription']?> </textarea></br></br>
		<label for="OrgFax"> Company Fax Number : </label>
			<input type ="text" name="OrgFax" maxlength="13" required value="<?php echo $row['OrgFax']?>"></br></br>
		<label for="orgAddress"> Company Address : </label>
			<textarea rows="1" cols="30"name="OrgAddress" maxlength="255" required> <?php echo $row['OrgAddress']?></textarea></br></br>
			
		<?php
		}
	}
?>
			<input class="input button1" type="submit" name="update" value="Update"> &nbsp <a class="button" href="changePwd.php?id=<?php echo $_SESSION["UID"]?>"> Change Password </a>
		</form>
	</center>
	</main>
</body>
</html>