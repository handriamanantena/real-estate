
<?php
	session_start();
	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
		if(isset($_SESSION['submission'])){
			echo '<script language="javascript">';
			echo 'alert("Incorrect Password")';
			echo '</script>';
		}
		$_SESSION['submission']=null; //sets to null to not open alert window if user did not click submission buton
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
			<?php include "header.php"; ?>		
			<main>
				<div id="content">
					<div><h1>Sign In</h1></div>
					<div id= "forumelements">	
						<form id ="signInForm" method="post" onsubmit="return validateSignIn();" action="phpProcessFiles/processLogin.php">
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
								<label for="loginName">Login Name:</label>
								<input type="text" name="loginName" required="required">
							</div>
							<div class = "forumdivision">
								<label for="password">Enter Password:</label>
								<input type="password" name="password" required="required" title="Only letters and numbers and at least one of each and minimum of 6 characters">
								<label name="wrongPass"></label>
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
