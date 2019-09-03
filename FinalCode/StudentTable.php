

	<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel = "stylesheet" type="text/css" href="style.css">
	<link rel = "stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
				
</head>
<body>
<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Surname</th>
	</tr>
	
	<?php
$conn = mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, 'test');

if (isset($_POST['showFace'])) {
	$image = $_POST['hiddenImage'];

	echo "$image";
}
else
echo "string";

	
	
	if($conn -> connect_error) {
		die("Connection failed:" .$conn -> connect_error);
	}
	
	$sql = "SELECT id, name, surname, image from tbl_student";
	
	$result = $conn-> query($sql);
	
	if ($result-> num_rows > 0) {
		while($row = $result-> fetch_assoc()) {
			
			?>
			
			<tr><td> <?php echo $row["id"] ?> </td> <td> <?php echo $row ["name"] ?> </td> 
				<td> <?php echo $row["surname"]?> </td> <td> <?php echo $row["image"]?> </td> <td> <form method="post"> 
					<input type="submit" class="btn btn-primary" name="showFace" value="show face"/>

					<input type="hidden" name="hiddenImage" value="<?php echo($row["image"]); ?>"/>
			</form > </td> </tr>
			<?php
		} 
		
		 
		echo "</table>";
	} else {
		echo "0 results";
	}		
		$conn-> close();
	?>
</table>
</body>

</html>

