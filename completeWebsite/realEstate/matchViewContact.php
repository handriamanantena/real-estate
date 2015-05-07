<?php
	session_start();
	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
		header("Location: signIn.php");
	}
	$fname = $_SESSION['fname']; 
	$clientType=$_SESSION['clientType'];
	$id = $_SESSION['matchId'];

	$db = mysqli_connect("localhost", "root", "", "rental_7435282");
	if($clientType=="owner")
		 $query = "SELECT * FROM tenant WHERE id ='$id'"; //display tenant contact
	else
		 $query = "SELECT * FROM owner WHERE id ='$id'";//display owner contact
    $result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	$name = $row["fname"] . " " . $row["lname"];
	$email = $row["email"];
	$phone = $row["phoneNumber"];

			?>
<!DOCTYPE html>
	<html>
		<head>
			<title>RentBox</title>
			<link rel="stylesheet" type="text/css" href="css/CSSwelcomePageOwnerSelection.css">
			<script src="validation.js"></script> 
			<style>
			</style>
		</head>
		<body>	  
			<?php 
				if($clientType=="tenant")
					include "headerLoggedInTenant.php";
				else
					include "headerLoggedInOwner.php" ?>
			<main>
				<div id="content">
					<div><h1>Welcome <?php $fname; ?> </h1></div>
					<div id= "forumcontainer">	
						<form id ="registrationForm" action="demo_form.asp" method="get" onsubmit="return validateCreateAccountForm();">
							<h1><?php echo $name; ?>'s Contact Information</h1>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel" >Match name: <?php echo " ".$name;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel" >Match Phone Number: <?php echo " " . $phone;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel" >Email: <?php echo " " . $email;?></label>
								</div>					
						</div>
						</form>
						<div class="imageconatainerdiv">
							<div class="imagediv"><img class="images" src="images/indexImages/bottomimage1.jpg" alt="Not Found"/></div>
							<div class="imagediv"><img class="images" src="images/indexImages/bottomimage2.jpg" alt="Not Found"/></div>
							<div class="imagediv"><img class="images" src="images/indexImages/bottomimage3.jpg" alt="Not Found"/></div>
							<div class="imagediv"><img class="images" src="images/indexImages/bottomimage4.jpg" alt="Not Found"/></div>
							<div class="imagediv"><img class="images" src="images/indexImages/bottomimage5.jpg" alt="Not Found"/></div>
							<div class="imagediv"><img class="images" src="images/indexImages/bottomimage6.jpg" alt="Not Found"/></div>
						</div>
					</div>			
				</div>				
			</main>
				<footer>
					<div id="footediv">
					(514) 908-6980  |  2530 rue Derp, Montreal, QC  |  herpDerpLER@hotmail.com
					</div>
					Copyright &copy; 2008 Herp Derp 
				</footer>
		</body>
	</html>
