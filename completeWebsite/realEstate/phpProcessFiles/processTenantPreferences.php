<?php
	session_start();	
?>
<html>
	<head>
		<title>Proccess Tenant Preferences</title>
	</head>
	<body>
		<?php
				$cityLocation=$_POST["cityLocation"];
				$province =$_POST["province"];
				$availibility=$_POST["availibility"];
				$price=$_POST["price"];
				$personalMessage=$_POST["personalMessage"];
				$paymentMethod=$_POST["paymentMethod"];
				$cityLocation = htmlspecialchars($cityLocation);
				$province =  htmlspecialchars($province);
				$availibility = htmlspecialchars($availibility);
				$price =htmlspecialchars($price);
				$paymentMethod = htmlspecialchars($paymentMethod);
				$personalMessage = htmlspecialchars($personalMessage);
				$_SESSION["cityLocation"] = $cityLocation;
				$_SESSION["province"] = $province;
				$_SESSION["availibility"] = $availibility;
				$_SESSION["price"] = $price;
				$_SESSION["paymentMethod"] = $paymentMethod;
				$loginName =$_SESSION["loginName"];
				$password = $_SESSION["password"] ;
				$fname =$_SESSION["fname"];
				$lname =$_SESSION["lname"];
				$clientType =$_SESSION["clientType"];
				$phone = $_SESSION["phone"] ;
				$email =$_SESSION["email"];
				$age = $_SESSION["age"];
				$petString =$_SESSION["petString"];
				$smoke =$_SESSION["smoke"];
				$wage =$_SESSION["wage"];
				$occupation =$_SESSION["occupation"] ;
				$inhabitants =$_SESSION["inhabitants"];
				$payMethod =$_SESSION["payMethod"];
				$db = mysqli_connect("localhost", "root", "", "rental_7435282");
				$query = "INSERT INTO tenant (username, password,fname,lname,phoneNumber,email,age,pet,smoke,wage,occupation,inhabitants,personalMessage) VALUES ('$loginName', '$password','$fname','$lname','$phone','$email','$age','$petString','$smoke','$wage','$occupation','$inhabitants','$personalMessage')";
				$result = mysqli_query($db, $query);
				$primaryKey = mysqli_insert_id($db);
				$_SESSION["id"] = $primaryKey;
				$query = "INSERT INTO tenantpreferences (tenantID,city,province,available,price,paymentMethod) VALUES ('$primaryKey','$cityLocation','$province','$availibility','$price','$paymentMethod')";
				$result = mysqli_query($db, $query);
				/*$query ="UPDATE owner SET streetAndNumber= '$streetAndNumber' WHERE fname='$fname'";
				$result = mysqli_query($db, $query);
				$query ="UPDATE owner SET appartment= '$appartment' WHERE fname='$fname'";
				$result = mysqli_query($db, $query);
				$query ="UPDATE owner SET city= '$city' WHERE fname='$fname'";
				$result = mysqli_query($db, $query);
				$query ="UPDATE owner SET wage= '$wage' WHERE fname='$fname'";
				$result = mysqli_query($db, $query);
				$query ="UPDATE owner SET occupation= '$occupation' WHERE fname='$fname'";
				$result = mysqli_query($db, $query);
				$query ="UPDATE owner SET inhabitants= '$inhabitants' WHERE fname='$fname'";
				$result = mysqli_query($db, $query);
				$query ="UPDATE owner SET paymentMethod= '$payMethod' WHERE fname='$fname'";
				$result = mysqli_query($db, $query);*/
				header ('Location: ../viewTenantProfile.php');
		?>
	</body>
</html>
