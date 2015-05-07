<?php
	session_start();
?>
<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="universal.css">
			<style type="text/css">
			
			img{
				position:relative;
				height:281px;
				width:450px;
				box-shadow: 10px 10px 5px #888888;
			}
			
			#cf {
				position:relative;
				height:281px;
				width:450px;
				margin:0 auto;
				box-shadow: 10px 10px 5px #888888;
			}

			#cf img {
			position:absolute;
			left:0;
			-webkit-transition: opacity 1s ease-in-out;
			-moz-transition: opacity 1s ease-in-out;
			-o-transition: opacity 1s ease-in-out;
			transition: opacity 1s ease-in-out;
			}

			#cf img.top:hover {
			opacity:0;
			}
			
			#cf img.transparent {
				opacity:0;
			}
			#cf_onclick {
			cursor:pointer;
			}
			
			</style>
		</head>
		<body>	  
			<?php 
				if(!(isset($_SESSION['login']) && $_SESSION['login'] != '')) //not logged in
					include "header.php"; 
				else if($clientType=="tenant")
					include "headerLoggedInTenant.php";
				else
					include "headerLoggedInOwner.php";
			?>		
			<main>
				<div id="content">
					<div><h1>Welcome to RentBox</h1></div>
					<div>
					<p>Founded in 2015, RentBox's mission is to give people the power to find affordable property. People use RentBox to find the most suitable 
					tenant or to find the most suitable property to rent. Create an account today as a tenant or an owner	 and find your match with RentBox.</p>
					</div>
					<div id="cf">
						<img class="bottom" src="images/indexImages/slideshowImage1.jpg" alt="Not Found"/>
						<img class="top" src="images/indexImages/slideshowImage2.jpg" alt="Not Found"/>
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
