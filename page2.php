<!DOCTYPE html>
<html>
<head>
	<title>Add Record</title>
</head>
<body>
	<h1>Add Record</h1>
	<form method="post">
		<label>ID:</label>
		<input type="number" name="id">
		<br>
		<label>Name:</label>
		<input type="text" name="name">
		<br>
		<label>Age:</label>
		<input type="number" name="age">
		<br>
		<input type="submit" name="add" value="Add">
	</form>
	<br>
	<?php
	// establish database connection
	$conn = mysqli_connect("localhost", "username", "password", "regdb");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	if (isset($_POST['add'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		
		$sql = "INSERT INTO visitor (ID, Name, Age) VALUES ('$id', '$name', '$age')";
		if (mysqli_query($conn, $sql)) {
			echo "Record added successfully.";
		} else {
			echo "Error adding record: " . mysqli_error($conn);
		}
	}
	
	mysqli_close($conn);
	?>
</body>
</html>
