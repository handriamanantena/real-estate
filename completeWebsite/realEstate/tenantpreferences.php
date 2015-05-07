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
		</head>
		<body>	  
			<?php include "headerCreateAccount.php";?>	
			<main>
				<div id="content">
					<div><h1>Your Preferences</h1></div>
					<div id= "forumelements">	
						<form id ="registrationForm" action="phpProcessFiles/processTenantPreferences.php" method="post">
							<div class = "forumdivision">
								 <label for="street">Prefered Location</label>
								 <input type="text" id="city" name="cityLocation" placeholder ="City" required="required" pattern="^(([a-zA-Z]+(\-| | \-|\- | \- )[a-zA-Z]+)|([a-zA-Z]+)$)" title="only letters and 1 space or -">
								 <select id="provinceId" name="province">	
									<option value="ON">ON</option>
									<option value="QC">QC</option>
									<option value="NS">NS</option>
									<option value="NB">NB</option>
									<option value="MB">MB</option>
									<option value="BC">BC</option>
									<option value="PE">PE</option>
									<option value="SK">SK</option>
									<option value="AB">AB</option>
									<option value="NL">NL</option>
									<option value="YT">YT</option>
									<option value="NT">NT</option>
									<option value="NU">NU</option>
								</select>
							</div>
							<div class = "forumdivision">
								<label for="availability">Availability:</label>
								<select required="required" id="availability" name="availibility">	
									<option value="Available">Only show available property</option>
									<option value="Not Available">Show all property</option>
								</select>
							</div>
							<div class = "forumdivision">
								<label for="price">Prefered Rent:</label>
								<label style="float:none;width:5px;padding:0px;marking:0px;">$</label>
								<input type="text" id="price" name ="price"style="padding-left:0px;" required="required" pattern="[0-9]+(|\.[0-9]{1,2})" title="ex: 123 or 123.00">
								<select id="paymentmethod" name= "paymentMethod">	
									<option value="Per Week">Per Week</option>
									<option value="Per Month">Per Month</option>
									<option value="Bimonthly">Bimonthly</option>
									<option value="Per Year">Per Year</option>
								</select>
							</div>
							<div class = "forumdivision">
								<label for="personalmessage">Personal Message:</label>
								<textarea id="personalmessage" name ="personalMessage" rows="5" cols="65"  pattern= "^(\W*\w*\W*){0,10}$" title="maximum of 300 words">
								</textarea>
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
