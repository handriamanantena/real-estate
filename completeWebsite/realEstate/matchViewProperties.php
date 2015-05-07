
<?php
	session_start();
	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
		header("Location: signIn.php");
	}
	$fname = $_SESSION['fname']; 
	$id = $_SESSION['matchId'];

	//$username=$_SESSION['username'];
		$db = mysqli_connect("localhost", "root", "", "rental_7435282");
    	$query = "SELECT * FROM propertylistings WHERE ownerId	='$id'";
    	$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);
		$title = $row["title"];
		$street = $row["streetAndNumber"];
		$appartmentNumber = $row["appartement"];
		$city = $row["city"];
		$postalCode = $row["postalCode"];
		$province = $row["province"];
		$available = $row["available"];
		$price = $row["price"];
		$paymentMethod = $row["paymentMethod"];

	?>
<!DOCTYPE html>
	<html>
		<head>
			<title>RentBox</title>
			<link rel="stylesheet" type="text/css" href="css/CSSwelcomePage.css">
			<script src="validation.js"></script> 
		</head>
		<body>	  
			<?php include "headerLoggedInTenant.php"; ?>	
			<main>
				<div id="content">
					<div><h1>Welcome <?php echo $fname; ?> </h1></div>
					<div id= "forumcontainer">	
						<form id ="registrationForm" onsubmit="return validateCreateAccountForm();">
							<h1>Matched Property</h1>
								<div class="forumdivisionAll">
									<img class="propertImage" src="images/indexImages/bottomimage1.jpg" alt="Not Found"/>
								</div>
							<div class="infoBackground">
								<div class = "forumdivisionAll">
									 <label class="propertyLabel" >Title of add: <?php echo $title;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel">Street of Property: <?php echo $street;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel">Appartment Number: <?php echo $appartmentNumber;?></label>
								</div>
								<div class = "forumdivisionAll">	 
									 <label class="propertyLabel">City: <?php echo $city;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel">Postal Code: <?php echo $postalCode;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel">Province: <?php echo $province;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel">Availability:<?php echo $available;?></label>
								</div>
								<div class = "forumdivisionAll">							
									 <label class="propertyLabel">Price:$<?php echo $price;?> <?php echo $paymentMethod;?></label>
								</div>
							</div>
							<div id="submitButtonsdiv">
								<input class="buttons" type="button" value="View Your Profile" onclick="location.href ='viewTenantProfile.php';">
								<input class="buttons" type="button" value="View Your Preferences" onclick="location.href ='viewTenantCriteria.php';">
								<input class="buttons" type="button" value="Contact" onclick="location.href ='matchViewContact.php';">

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
