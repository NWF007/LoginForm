	<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel = "stylesheet" type="text/css" href="style.css">
	<link rel = "stylesheet" type="text/css"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		
		<h4>Welcome</h4>
		
</head>


<?php

	
	//values from form
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	
	$Password = md5($Password);
	
	//connect to the server and select database
	$DBConnect = mysqli_connect("localhost", "root", "");
	mysqli_select_db($DBConnect, 'test');
	
	//Query the db for user_error
	$result = mysqli_query($DBConnect,"select * from tbl_user where email = '$Email' and password = '$Password'")
	or die("Failed to query database ".mysqli_error($DBConnect));
	
	$row = mysqli_fetch_array($result);
	
	?>
	
	
	<?php
	
	//check if email and password exist in db
		if($row['Email'] == $Email && $row['Password'] == $Password) { 
		
		//select data from database
			$sql = "SELECT ID, FName, LName, Email, CellNum, Password FROM tbl_user";
			$results = mysqli_query($DBConnect,$sql);
	
		//Associative array
			$rows = mysqli_fetch_assoc($results);
			
			echo "User " .$row['FName']." ".$row['LName']." with password ".$row['Password'] . " is logged in <br>";
			
			printf ("%s %s %s %s %s %s\n", $rows["ID"], $rows["FName"], $rows["LName"], $rows["Email"], $rows["CellNum"], $rows["Password"]."<br>");
		
			echo "Login success!!! <br>"; 	
			
			//mysqli_free_result($results);
			//header("refresh:5; url= Home.html");
		}
		else {
			echo "Email does not exist, please login again or register";
			header("refresh:4; url= LoginForm.html");
		}	
	?>

<body>

	<form method="post" action="StudentTable.php">
	</div>
		<button type="submit" class="btn btn-primary" name = "Students_btn"> Show Students </button>	
	</div>
</body>

</html>

