<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" href="admin.css?v=<?php echo time(); ?>">
</head>

<title> Organization List </title>
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
</center>
</header>
<body>
<main> <br>
<center><img class="threat" src="van.png" >
<br>Ahhh humanity restored I guess</p></center><br>
<center>
<?php
$orgName = $_POST['orgName'];
?>
<h3> ORGANISATION:  </h3><input style="pointer-events:none; opacity: 0.5;" type="text" value="<?php echo $orgName?>"> </input><br>
<br><br>
<?php 
		//amik orgID first
		$sql= "SELECT orgID from organisation WHERE orgName='$orgName';";
		$result=$conn->query($sql);
		$row= $result->fetch_assoc();
		$orgID = $row['orgID'];
		$donorID="";
		
		$sql="SELECT * from payment WHERE orgID ='$orgID';";
		$result= $conn->query($sql);
		if($result-> num_rows >0){
			while($row=$result->fetch_assoc()){
				
				$donorID = $row['donorID'];
				?>
				<table style="width:90%">
				<tr>
					<th class="table_title"> PAYMENT ID </th>
					<th class="table_title"> DONATION RECEIVED </th>
					<th class="table_title"> DONOR NAME </th>
					<th class="table_title"> DONOR EMAIL </th>
				</tr>
				<tr>
					<th> <?php echo $row['paymentID'];?> </th>
					<th> <?php echo $row['payAmount'];?> </th>
			<?php
			}	
		}else{ echo "No results<br><br>"; }
			$sql="SELECT donorName,donorEmail from donor WHERE donorID ='$donorID';";
		$result= $conn->query($sql);
		if($result-> num_rows >0){
			while($row=$result->fetch_assoc()){		
				?>
				
					<th> <?php echo $row['donorName'];?> </th>
					<th> <?php echo $row['donorEmail'];?> </th>
				</tr>
		<?php
			}
		}
		$conn->close();
		?>
			</table>	
		<br>
</main>
</body>
<footer style="font-size: 12px" >Icons made by <a style="font-size: 12px" class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a style="font-size: 12px" class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>