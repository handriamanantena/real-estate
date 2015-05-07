<?php
	session_start();
	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
		header("Location: signIn.php");
	}
	$fname = $_SESSION['fname']; 
	$id = $_SESSION['id'];

	//$username=$_SESSION['username'];
		$db = mysqli_connect("localhost", "root", "", "rental_7435282");
    	$query = "SELECT * FROM owner WHERE id	='$id'";
    	$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);
		$age = $row["age"];
		$pet = $row["pet"];
		$smoke;
		if($row["smoke"]=="1")
			$smoke="Yes";
		else
			$smoke="No";

		$wage = $row["wage"];
		$occupation = $row["occupation"];
		$inhabitants = $row["inhabitants"];
		$dog ="0";
		$cat ="0";
		$insects ="0";
		$birds="0";
		$fish="0";
		$all ="0";
		$none="0";
		if ($pet=='None') {
			$none="1";
		}
		else if($pet=="All"){
				$all="1";
				$dog="1";
				$cat="1";
				$insects="1";
				$birds="1";
				$fish="1";
			}
			else{
				if (strpos($pet,'Dog') !== false) {
    				$dog ="1";
				}
				if (strpos($pet,'Cat') !== false) {
    				$cat ="1";
				}
				if (strpos($pet,'Insects') !== false) {
    				$cat ="1";
				}
				if (strpos($pet,'Bird\(s\)') !== false) {
					$birds="1";
				}
				if (strpos($pet,'Fish') !== false) {
					$fish="1";
				}
			}
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
			<?php include "headerLoggedInOwner.php"; ?>
			<main>
				<div id="content">
					<div><h1>Welcome <?php echo $fname; ?> </h1></div>
					<div id= "forumcontainer">	
						<form id ="registrationForm" action="demo_form.asp" method="get" onsubmit="return validateCreateAccountForm();">
							<h1>Your Tenant Preferences</h1>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel" >Age of Tenant: <?php echo $age;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel" >Smoke: <?php echo $smoke;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel" >Prefered Wage: <?php echo $wage;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel" >Occupation: <?php echo $occupation;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel" >Inhabitants: <?php echo $inhabitants;?></label>
								</div>
								<div class = "forumdivisionAll">
									 <label class="propertyLabel">pets allowed:</label>
								</div>
								<div class = "forumdivisionCheck">
									 Dog<input type="checkbox" class ="checkButtonsnoEdit" name="pets[]" id="dog" onclick="return false" value="Dog" <?php echo ($dog=="1" ? 'checked' : '');?> >
									 Cat<input class ="checkButtonsnoEdit" type="checkbox" name="pets[]" id="cat" value="Cat" onclick="return false" <?php echo ($cat==1 ? 'checked' : '');?>  >

									 Insects<input class ="checkButtonsnoEdit" type="checkbox" name="pets[]" id = "insects" value="Insects" onclick="return false" <?php echo ($insects==1 ? 'checked' : '');?>>
									 Bird(s)<input class ="checkButtonsnoEdit" type="checkbox" name="pets[]" id = "birds" value="Bird\(s\)" onclick="return false" <?php echo ($birds==1 ? 'checked' : '');?>>

									 Fish<input class ="checkButtonsnoEdit" type="checkbox" name="pets[]" id = "fish" value="Fish" onclick="return false" <?php echo ($fish==1 ? 'checked' : '');?>>
									 All of the above<input class ="checkButtonsnoEdit" type="checkbox" name="pets[]" id = "all" value="All"onclick="return false" <?php echo ($all==1 ? 'checked' : '');?>>
									 None<input class ="checkButtonsnoEdit" type="checkbox" name="pets[]" id= "none" value="None" onclick="return false" <?php echo ($none==1 ? 'checked' : '');?>>
								</div>


							<div id="submitButtonsdiv">
								<input class="buttons" type="button" value="View Your Property" onclick="location.href ='viewOwnerProperty.php';">
								<input class="buttons" type="button" value="Match" onclick = "location.href = 'algorithm/algorithm.php'">
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
