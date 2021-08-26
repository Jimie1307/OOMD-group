<?php
include("config.php");
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Payment Checkout Form</title>
	<link rel="stylesheet" href="paystyle.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<link href='https://fonts.googleapis.com/css?family=Baloo Bhaijaan' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"> 
    </script> 
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
            integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA="
            crossorigin="anonymous"> 
    </script> 
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"> 
    </script> 
      
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"> 
    </script> 
	
</head>
<body>

	<div class="wrapper">
		<div class="payment">
			<div >
			<img class="payment-logo" src="heart.png"></img>
			</div>
			<h2>Payment Gateway</h2>
			
		<form action="submitpayment.php" method="POST">
			<div class="form">
				<div class="card space icon-relative">
				<label class="label"> Name:</label>
				<input class="input" type="text" name="donorName" id="dName" placeholder="your first and last name" required>
				</input>
				</div>
				
				<div class="card space icon-relative">
				<label class="label"> Email:</label>
				<input class="input" type="email" name="donorEmail" id="dName" placeholder="ex: your@domain.com" required>
				</input>
				</div>

				<div class="card space icon-relative">
				<label class="label">Payment Amount (RM):</label>
				<select id="pAmount" class="input" name="paymentAmount" required>
					<option value="instruction">Please choose an amount</option>
					<option value="100">100.00</option>
					<option value="50">50.00</option>
					<option value="10">10.00</option>
					<option value="5">5.00</option>
					<option value="1">1.00</option>
				</select>
				</div>
					
				<div class="card space icon-relative">
				<label class="label">Organisation Name:</label>
					<select class="input" name="orgName" required >
						<option value="0">Please choose organisation</option>
			<?php  
			$sql="SELECT orgName from organisation";
			$result=$conn->query($sql);
			if($result-> num_rows>0){
				while($row=$result->fetch_assoc()){
			?>
				<option value="<?php echo $row['orgName']?>"><?php echo $row['orgName']?></option>
				<?php
				}
			}
			?>
			</select>
				
				<div>
					<input type="submit" value="Pay" class="btn"></input>
				</div>
			</div>
			</form>
		</div>
	</div>

   <script> 
   
        $('input[name="pAmount"]').mask('0000.00'); 
        $('input[name="pDate"]').mask('00 / 00 / 0000'); 
        $('input[name="orID"]').mask('0'); 

    </script> 
</body>
</html>