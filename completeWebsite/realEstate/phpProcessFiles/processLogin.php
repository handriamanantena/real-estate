<?php
	session_start();
	if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')){
		$_SESSION['submission']=true;
		header("Location: ../signIn.php");
	}	
?>
<html>
	<head>
		<title>RentBox Log in</title>
	</head>
	<body>
		<?php
				$loginName = $_POST["loginName"];
				$password = $_POST["password"];
				$loginName = htmlspecialchars($loginName);
				$password = htmlspecialchars($password);
				$db = mysqli_connect("localhost", "root", "", "rental_7435282");
				$clientType =  $_POST['accountType'];
				if($clientType=="Tenant"){
					$query ="SELECT * FROM tenant WHERE username = '$loginName' AND password = '$password'";
					$_SESSION['clientType']="tenant";
				}
				else{
					$query ="SELECT * FROM owner WHERE username = '$loginName' AND password = '$password'";
					$_SESSION['clientType']="owner";
				}
				$result = mysqli_query($db, $query);
				$num_rows = mysqli_num_rows($result);
				if ($num_rows > 0) {
					$_SESSION['login'] = "ok";			
					while($rows=mysqli_fetch_assoc($result)){
						if($rows["username"]==$loginName){
							$_SESSION['fname']=$rows["fname"];
							$_SESSION['id']=$rows["id"];
							//$_SESSION['username']=$loginName;
							break;
						}
					}
					if($clientType=="Tenant")
						header ('Location: ../viewTenantProfile.php');
					else
						header ('Location: ../viewOwnerSelectionCriteria.php');
  				//exit; // Ensures, that there is no code _after_ the redirect executed
				}
		?>
	</body>
</html>
