
<?php
	session_start();
	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
		header("Location: ../CreateAccount.php");
	}	
?>
<html>
	<head>
		<title>Process</title>
	</head>
	<body>
		<?php	
			$loginName = $_POST["loginName"];
			$db = mysqli_connect("localhost", "root", "", "rental_7435282");
			$query1 ="SELECT * FROM owner WHERE username = '$loginName'";
			$result1 = mysqli_query($db, $query1);
			$query2 ="SELECT * FROM tenant WHERE username = '$loginName'";
			$result2 = mysqli_query($db, $query2);
			$num_rows1 = mysqli_num_rows($result1);
			$num_rows2 = mysqli_num_rows($result2);
			if($num_rows1 >0 ||$num_rows2 >0){ //checks if user name was used
					$_SESSION['validUser']="used";
					header("Location: ../CreateAccount.php");
			}
			else{
				$password = $_POST["password"];
				$fname =  $_POST["fname"];
				$lname =  $_POST["lname"];
				$clientType =  $_POST['accountType'];
				$phone = $_POST["phoneNumber"];
				$email = $_POST["email"];
				$loginName = htmlspecialchars($loginName);
				$password = htmlspecialchars($password);
				$fname = htmlspecialchars($fname);
				$lname =  htmlspecialchars($lname);
				$clientType =  htmlspecialchars($clientType);
				$phone = htmlspecialchars($phone);
				$email = htmlspecialchars($email);
				$_SESSION["loginName"] = $loginName;
				$_SESSION["password"] = $password;
				$_SESSION["fname"] = $fname;
				$_SESSION["lname"] = $lname;
				$_SESSION["clientType"] = $clientType;
				$_SESSION["phone"] = $phone;
				$_SESSION["email"] = $email;
				if (mysqli_connect_errno()) {
					print "Connection to database failed: ".mysqli_connect_error();
					exit();
				}
				$_SESSION['login'] = "ok";
				if($clientType=="Tenant"){
					header("Location: ../tenantprofile.php");
				}
				else{
					header("Location: ../OwnerCriteria.php");
				}
			}
			
		?>	
	</body>
	
</html>