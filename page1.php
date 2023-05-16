<!DOCTYPE html>
<html>
<head>
	<title>Search Records</title>
</head>
<body>
	<h1>Search Records</h1>
	<form method="post">
		<label>Enter Visitor Name:</label>
		<input type="text" name="visitor_name">
		<input type="submit" name="search" value="Search">
	</form>
	<br>
	<?php
	// establish database connection
	$conn = mysqli_connect("localhost", "username", "password", "regdb");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	if (isset($_POST['search'])) {
		$visitor_name = $_POST['visitor_name'];
		$sql = "SELECT * FROM visitor WHERE Name LIKE '%$visitor_name%'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			echo "<table border='1'>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Age</th>
				</tr>";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
					<td>".$row['ID']."</td>
					<td>".$row['Name']."</td>
					<td>".$row['Age']."</td>
				</tr>";
			}
			echo "</table>";
		} else {
			echo "No records found.";
		}
	}
	
	mysqli_close($conn);
	?>
</body>
</html>
