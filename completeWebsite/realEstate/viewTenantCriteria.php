<?php
	session_start();
	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
		header("Location: signIn.php");
	}
	$fname = $_SESSION['fname']; 
	$id = $_SESSION['id'];

	//$username=$_SESSION['username'];
		$db = mysqli_connect("localhost", "root", "", "rental_7435282");
    	$query = "SELECT * FROM tenantpreferences WHERE tenantId='$id'";
    	$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);
		$city = $row["city"];
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
						<form id ="registrationForm" action="demo_form.asp" method="get" onsubmit="return validateCreateAccountForm();">
							<h1>Your Property Preferences</h1>
								<div class="forumdivisionAll">
									<img class="propertImage" src="images/indexImages/bottomimage1.jpg" alt="Not Found"/>
								</div>
							<div class="infoBackground">
								<div class = "forumdivisionAll">	 
									 <label class="propertyLabel">Prefered City: <?php echo $city;?></label>
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
								<input class="buttons" type="button" value="Match" onclick = "location.href = 'algorithm/algorithm.php'">
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