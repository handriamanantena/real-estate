<?php 	
	session_start();
		if(isset($_SESSION['validUser'])){
			echo '<script language="javascript">';
			echo 'alert("User Name already used. Please enter a new one")';
			echo '</script>';
		}
		$_SESSION['validUser']=null; //sets to null to not open alert window if user did not click submission buton
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>RentBox</title>
			<link rel="stylesheet" type="text/css" href="universal.css">
			<script src="validation.js"></script> 
			
		</head>
		<body>	  
			<?php include "header.php"; ?>		
			<main>
				<div id="content">
					<div><h1>Create an Account</h1></div>
					<div id= "forumelements">	
						<form id ="registrationForm" action="phpProcessFiles/processCreateAccount.php" method="post" onsubmit="return validateCreateAccountForm();">
							<div class = "forumdivision">
								 <label for="fname">First name:</label>
								 <input type="text" name="fname" required="required" pattern="^[A-Za-z]+\-?[A-Za-z]+$" title="Letters and -"> 
							</div>
							<div class = "forumdivision">
								<label for="lname">Last name:</label>
								<input type="text" name="lname" required="required" pattern="^[A-Za-z]+\-?[A-Za-z]+$" title="Letters and -">
							</div>
							<div class = "forumdivision">
								<label for="clientType">Tenant:</label>
								<input class = "radioButton" type="radio" id="tenant" value="Tenant" name ="accountType">
							</div>
							<div class = "forumdivision">
								<label for="owner">Owner:</label>
								<input type="radio" class = "radioButton" id="owner" value="Owner"  name ="accountType">
								<label style="float:none;width:auto;text-align:right;padding-right:12px;margin-top:12px;clear:left;color:red" id="warningLabelcheck"></label>
							</div>
							<div class = "forumdivision">
								<label for="phoneNumber">Phone Number:</label>
								<input type="text" name="phoneNumber" required="required" pattern="^\(\d{3}\)\d{3}\-\d{4}$" title="(YYY)YYY-YYYY">
							</div>
							<div class = "forumdivision">
								<label for="email">Email Address:</label>
								<input type="text" name="email" required="required" pattern="^\w+@[A-Za-z]+\.com$" title="ex: XXXXX@XXXX.XXX">
							</div>
							<div class = "forumdivision">
								<label for="loginName">Login Name:</label>
								<input type="text" name="loginName" required="required" pattern="^[^\W_]{6,}$" title="letters and numbers and at least six characters">
							</div>
							<div class = "forumdivision">
								<label for="password">Enter Password:</label>
								<input type="password" id="password" name ="password" required="required" pattern="^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9]{6,}$" title="Only letters and numbers and at least one of each and minimum of 6 characters">
							</div>
							<div class = "forumdivision">
								<label for="confirmpassword">Confirm Password:</label>
								<input type="password" id="confirmpassword" >
								<label style="float:none;width:auto;text-align:right;padding-right:12px;margin-top:12px;clear:left;color:red" id="warningLabelpass"></label>
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
