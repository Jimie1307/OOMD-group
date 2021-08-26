
<?php
include("config.php");
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register Volunteer</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
	<body>
		<div class="register">
			<h1>Register As A Volunteer!</h1>
			<form action="applyVolunteer_action.php" method="post" autocomplete="off">

			<label for="Event Name"><i class="fa fa-user-circle"></i></label>
            <input style=" pointer-events: none;" type="text" name="eventName"  id="eventName" value="
                    <?php 
					$eventID= $_GET["id"];
                    $sql=mysqli_query($conn,"SELECT eventTitle from event WHERE eventID='$eventID'");
                    while($row=$sql->fetch_assoc()){
                        echo $row['eventTitle'];
                    }
                    ?>" required>
					
            <label for="Phone Number"><i class="fa fa-phone"></i></label>
            <input type="text" name="phonenum" placeholder="Phone Number" id="phonenum" required>
			
                
			<label for="email"><i class="fas fa-envelope"></i></label>
            <input type="email" name="email" placeholder="Email" id="email" required>
             <input style="pointer-events: none; margin-bottom: -12%; padding: 2px; opacity: 0;" type="text" name="eventID" value="<?php echo $eventID?>" required>

            </input>

			<input type="submit" name="submit" value="Register">
			</form>
		</div>
	</body>
</html>

