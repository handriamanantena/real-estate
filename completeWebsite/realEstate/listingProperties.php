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
			<?php 
					include "headerCreateAccount.php";
			?>				
			<main>
				<div id="content">
					<div><h1>Add A New Property To Our Property Listings</h1></div>
					<div id= "forumelements">	
						<form id ="registrationForm" action="phpProcessFiles/processPropertyListings.php" method="post">
							<div class = "forumdivision">
								 <label for="title">Title of Add:</label>
								 <input type="text" id="title" name="titlename" required="required" pattern="\w*" title="Add title can only contains letters, - and numbers"> 
							</div>
							<div class = "forumdivision">
								 <label for="street">Address of Property:</label>
								 <input type="text" id="streetandnumber" name="street" placeholder ="Street and Number" required ="required" pattern="^(([a-zA-Z]+)|([a-zA-Z]+\-[a-zA-Z]+)|([0-9]+th)) [0-9]+$" title="Street Number ex:'Street 144'">
								 <input type="text" id="appartmentnumber" name="appartment"placeholder ="Appartment Number" pattern="^[0-9]+$" title="Enter Appartment number. Leave blank if not an appartment"> 								 
								 <input type="text" id="city" name="cityLocation" placeholder ="City" required="required" pattern="^(([a-zA-Z]+(\-| | \-|\- | \- )[a-zA-Z]+)|([a-zA-Z]+)$)" title="only letters and 1 space or -">
								 <input type="text" id="postalcode" name="postalCode" placeholder ="Postal Code" required ="required" pattern="^[a-zA-Z][0-9][a-zA-Z](\-| | \-|\- | \- |)[0-9][a-zA-Z][0-9]$" title="Invalid postal code. ex:X0X X0X">
								 <select style="width=10px;" id="provinceID" name="province">	
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
								<label for="availability">Property Availible?</label>
								<select required="required" id="availability" name="availibility">	
									<option value="Available">Available</option>
									<option value="Not Available">Not Available</option>
								</select>
							</div>
							<div class = "forumdivision">
								<label for="price">Price:</label>
								<label style="float:none;width:5px;padding:0px;marking:0px;">$</label>
								<input type="text" id="price" name="price" style="padding-left:0px;" required="required" pattern="[0-9]+(|\.[0-9]{1,2})" title="ex: 123 or 123.00">
								<select name="paymentMethod"id="pricerateType">	
									<option value="Per Week">Per Week</option>
									<option value="Per Monthonth">Per Month</option>
									<option value="Per BiYear">Bimonthly</option>
									<option value="Per Year">Per Year</option>
								</select>
							</div>
							<div class = "forumdivision">
								<label for="personalmessage">Personal Message:</label>
								<textarea id="personalmessage" name ="personalMessagename" rows="5" cols="65" pattern= "^(\W*\w*\W*){0,10}$" title="maximum of 300 words">
								</textarea>
							</div>
							<div class = "forumdivision">
								<label for="imageofproperty">Upload Image:</label>
								<input type="file" id="imageofproperty" name="pic" accept="image/*">
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
