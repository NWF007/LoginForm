<?php

	
	//values from form
	$FName = $_POST['FName'];
	$LName = $_POST['LName'];
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$CellNum = $_POST['CellNum'];
	/**$userImg = $_POST['userImg'];*/
	$Password2 = $_POST['Password2'];
	
	//connect to the server and select database
	$DBConnect = mysqli_connect("localhost", "root", "");
	mysqli_select_db($DBConnect, 'test');
	
	//Query the db for user_error
	if (isset($_POST['register_btn'])) {
		
		
		//if ()
		
		if ($Password == $Password2) {
			//create user
			$Password = md5($Password);
			
			
			$sql ="INSERT INTO tbl_user (FName, LName, Email, CellNum, Password) 
			VALUES ('$FName' , '$LName' ,'$Email' ,'$CellNum', '$Password')";
			
			
			if($DBConnect->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " .$sql . "<br>" . $DBConnect->error;
			}
			
			
			//mysqli_query($DBConnect,$sql);
			
			//$_SESSION['message'] = "You are now registered";
			//echo "Record added!!";
			//$_SESSION['message'] = $FName;
			header("refresh:4; url= LoginForm.html");
			}else{
			
			echo "The passwords does not match";
			
		}
	}
	
	//if($sql) {
	//echo 'Inserted';
//}
	//else {
		//echo 'Not Inserted';
	//}
	
	?>