<?php
	session_start();	
?>
<html>
	<head>
		<title>Proccess Property Listing</title>
	</head>
	<body>
		<?php
				$street = $_POST["street"];
				$appartment=$_POST["appartment"];
				$cityLocation=$_POST["cityLocation"];
				$postalCode =$_POST["postalCode"];
				$province =$_POST["province"];
				$availibility=$_POST["availibility"];
				$price=$_POST["price"];
				$paymentMethod=$_POST["paymentMethod"];
				$personalMessage=$_POST["personalMessagename"];
				$title=$_POST["titlename"];
				$street = htmlspecialchars($street);
				$appartment = htmlspecialchars($appartment);
				$cityLocation = htmlspecialchars($cityLocation);
				$postalCode =  htmlspecialchars($postalCode);
				$province =  htmlspecialchars($province);
				$availibility = htmlspecialchars($availibility);
				$price =htmlspecialchars($price);
				$paymentMethod = htmlspecialchars($paymentMethod);
				$personalMessage = htmlspecialchars($personalMessage);
				$title = htmlspecialchars($title);
				$_SESSION["street"] = $street;
				$_SESSION["appartment"] = $appartment;
				$_SESSION["cityLocation"] = $cityLocation;
				$_SESSION["postalCode"] = $postalCode;
				$_SESSION["province"] = $province;
				$_SESSION["availibility"] = $availibility;
				$_SESSION["price"] = $price;
				$_SESSION["paymentMethod"] = $paymentMethod;
				$_SESSION["personalMessage"] = $personalMessage;
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
				$query = "INSERT INTO owner (username, password,fname,lname,phoneNumber,email,age,pet,smoke,wage,occupation,inhabitants,personalMessage) VALUES ('$loginName', '$password','$fname','$lname','$phone','$email','$age','$petString','$smoke','$wage','$occupation','$inhabitants','$personalMessage')";
				$result = mysqli_query($db, $query);
				$primaryKey = mysqli_insert_id($db);
				$_SESSION['id'] = $primaryKey;
				$query = "INSERT INTO propertylistings (ownerID,streetAndNumber,appartement,city,postalCode,province,available,price,paymentMethod,title) VALUES ('$primaryKey','$street','$appartment','$cityLocation','$postalCode','$province','$availibility','$price','$paymentMethod','$title')";
				$result = mysqli_query($db, $query);
				/*$db = mysqli_connect("localhost", "root", "", "rental_7435282");
				$fname=$_SESSION['fname'];
				$query ="UPDATE owner SET streetAndNumber= '$streetAndNumber' WHERE fname='$fname'";
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
				header ('Location: ../viewOwnerProperty.php');	
		?>
	</body>
</html>
