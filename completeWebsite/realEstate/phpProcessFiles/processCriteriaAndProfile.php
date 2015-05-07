<?php
	session_start();	
?>
<html>
	<head>
		<title>Proccess Profile or Criteria</title>
	</head>
	<body>
		<?php
				$age = $_POST["inputedage"];
				$petString='';
				foreach($_POST['pets'] as $check) {
					if($check=="All"){
						$petString="All";
						break;
					}
					$petString = $petString . "," . $check;
				}
				$petString= ltrim($petString, ',');	
				$smoke = $_POST["smoke"];
				if($smoke=="Yes")
					$smoke=True;
				else
					$smoke=False;
				$wage= $_POST["wage"];
				$occupation=  $_POST["job"];
				$inhabitants = $_POST["numberOfpeople"];
				$payMethod = $_POST["payMethod"];

				$age = htmlspecialchars($age);
				$petString = htmlspecialchars($petString);
				$smoke = htmlspecialchars($smoke);
				$wage =  htmlspecialchars($wage);
				$occupation =  htmlspecialchars($occupation);
				$inhabitants = htmlspecialchars($inhabitants);
				$payMethod = htmlspecialchars($payMethod);
				$_SESSION["age"] = $age;
				$_SESSION["petString"] = $petString;
				$_SESSION["smoke"] = $smoke;
				$_SESSION["wage"] = $wage;
				$_SESSION["occupation"] = $occupation;
				$_SESSION["inhabitants"] = $inhabitants;
				$_SESSION["payMethod"] = $payMethod;
				//$db = mysqli_connect("localhost", "root", "", "rental_7435282");

				if($_SESSION["clientType"]=="Tenant"){
					/*$fname=$_SESSION['fname'];
					$query ="UPDATE tenant SET age= '$age' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE tenant SET pet= '$petString' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE tenant SET smoke= '$smoke' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE tenant SET wage= '$wage' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE tenant SET occupation= '$occupation' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE tenant SET inhabitants= '$inhabitants' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE tenant SET paymentMethod= '$payMethod' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);*/
					header ('Location: ../tenantpreferences.php');
				}
				else{
					/*$fname=$_SESSION['fname'];
					$query ="UPDATE owner SET age= '$age' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE owner SET pet= '$petString' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE owner SET smoke= '$smoke' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE owner SET wage= '$wage' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE owner SET occupation= '$occupation' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE owner SET inhabitants= '$inhabitants' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);
					$query ="UPDATE owner SET paymentMethod= '$payMethod' WHERE fname='$fname'";
					$result = mysqli_query($db, $query);*/
					header ('Location: ../listingProperties.php');
				}
		?>
	</body>
</html>
