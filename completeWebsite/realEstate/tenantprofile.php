<?php
	session_start();
	if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
		header("Location: signIn.php");
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>RentBox</title>
			<link rel="stylesheet" type="text/css" href="universal.css">
			<script src="validation.js"></script> 
		</head>
		<body>	  
			<?php include "headerCreateAccount.php"; ?>	
			<main>
				<div id="content">
					<div><h1>Create Your Profile <?php echo $_SESSION["fname"]; ?> </h1></div>
					<div id= "forumelements">	
						<form id ="registrationForm" onsubmit="return validateTenantProfileForm();" action="phpProcessFiles/processCriteriaAndProfile.php" method="post">
							<div class = "forumdivision">
								 <label for="inputedage">Your Age:</label>
								 <input type="text" id="age" name="inputedage" placeholder ="Your age" required="required" pattern="^[0-9]{1,3}$" title="Invalid age"> 
							</div>		
							<div class = "forumdivision">
								<label for="petoptions">Pets owned:</label>
								Dog<input class ="checkButtons" type="checkbox" name="pets[]" id="dog" value="Dog" onchange="anyOtherCheckSelected(event)">
								Cat<input class ="checkButtons" type="checkbox" name="pets[]" id="cat" value="Cat" onchange="anyOtherCheckSelected(event)">
								Insects<input class ="checkButtons" type="checkbox" name="pets[]" id = "insects" value="Insects" onchange="anyOtherCheckSelected(event)">
								Bird(s)<input class ="checkButtons" type="checkbox" name="pets[]" id = "birds" value="Bird\(s\)" onchange="anyOtherCheckSelected(event)">
								Fish<input class ="checkButtons" type="checkbox" name="pets[]" id = "fish" value="Fish" onchange = "anyOtherCheckSelected(event)">
								All of the above<input class ="checkButtons" type="checkbox" name="pets[]" id = "all" value="All" onchange ="allAboveCheckedSelected()">
								None<input class ="checkButtons" type="checkbox" name="pets[]" id= "none" value="None" onchange="noneCheckedSelected()" checked>
							</div>
							<div class = "forumdivision">		
								<label for="smoker">Are you a smoker?</label>
								<select required="required" id="smokeoption" name="smoke">
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
							<div class = "forumdivision">
								<label for="salary">Your Wage:</label>
								<select id="salary" name="wage">	
									<option value="unemployed">Unemployed</option>
									<option value="10.50-20.00">10.50-19.99</option>
									<option value="20-29.99">20.00-29.99</option>
									<option value="30-39.99">30-39.99</option>
									<option value="40-49.99">40-49.99</option>
									<option value="50-above">50 or more</option>
								</select> Hourly Salary
							</div>
							<div class = "forumdivision">
								<label for="occupation">Your Occupation:</label>
								<select id="occupation" name= "job">	
									<option value="Student">Student</option>
									<option value="Unemployed">Unemployed</option>
									<option value="Management">Management</option>
									<option value="Office/Administration">Office/Administration</option>
									<option value="Architecture/Engineering">Architecture/Engineering</option>
									<option value="Art and Design">Art and Design</option>
									<option value="Military and Protective Service">Military and Protective Service</option>
									<option value="Healthcare Support">Healthcare Support</option>
									<option value="Education">Education</option>
								</select>
							</div>
							<div class = "forumdivision">
								<label for="numberofinhabitants">Inhabitants:</label>
								<select id="inhabitants" name="numberOfpeople">	
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="more than 5">More than 5</option>
								</select>
							</div>
							<div id="submitButtons">
								<input type="submit" value="Submit">
								<input type="reset" value="Reset">
							</div>
						</form>
					</div>
					<div class="imageconatainerdiv">
						<div class="imagediv"><img class="images" src="images/indexImages/bottomimage1.jpg" alt="Not Found"/></div>
						<div class="imagediv"><img class="images" src="images/indexImages/bottomimage2.jpg" alt="Not Found"/></div>
						<div class="imagediv"><img class="images" src="images/indexImages/bottomimage3.jpg" alt="Not Found"/></div>
						<div class="imagediv"><img class="images" src="images/indexImages/bottomimage4.jpg" alt="Not Found"/></div>
						<div class="imagediv"><img class="images" src="images/indexImages/bottomimage5.jpg" alt="Not Found"/></div>
						<div class="imagediv"><img class="images" src="images/indexImages/bottomimage6.jpg" alt="Not Found"/></div>
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
