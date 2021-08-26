<!DOCTYPE html>
<?php include('server.php'); ?>

<html>
<head>
		<title> Register </title>
	<link rel="stylesheet" href="farhanaStyle.css?v=<?php echo time(); ?>">
	</head>
	
	<body>
		<div class="header">
			<h2> Request as Associate </h2>
		</div>
		
		<form method="post" action="org_request.php">
		<?php include('errors.php') ?>	
			<div class="input-group">
				<label> Company Name </label>
				<input type="text" placeholder="Enter organisation name" name="requestName" required>
			</div>
			<div class="input-group">
				<label> Company Email </label>
				<input type="email" placeholder="Enter organisation email" name="requestEmail" required>
			</div>
		
			<div class="input-group">
				<button type="submit" name="register" class="btn">Request</button>
				<button class="btn"><a href="index.php">Back</button></a>

			</div>
			
		</form>	
		<br><br>
		<article>
	<p class="title"> TERMS AND CONDITION </p>
	<p> 1. You must be a legit company <br> 2. Once we receive your application, we will contact you for an arranged meeting <br> 3. If you're qualified, you will be notified<br> </p> 
	</article>
	</body>
</html>	