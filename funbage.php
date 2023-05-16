<!DOCTYPE html>
<html>
<head>
	<title>Zoo Guessing Game</title>
	<style>
		img {
			width: 300px;
			height: auto;
			margin-bottom: 10px;
		}
	</style>
</head>
<body style="background-color: aquamarine;">
	<h1>Zoo Guessing Game</h1>
	<p>Can you guess the name of this animal?</p>
	<img id="animal-pic" src="https://via.placeholder.com/300x200" alt="animal picture">
	<p id="clues"></p>
	<form action="check_guess.php" method="post">
		<label for="guess">Enter your guess:</label>
		<input type="text" id="guess" name="guess">
		<button type="submit" name="submit">Check</button>
	</form>
	<p id="result"></p>
    <?php
	// Define a PHP class to maintain formation about one row in one of the two tables
	class ZooAnimal {
		public $name;
		public $picture;
		public $clues;

		public function __construct($name, $picture, $clues) {
			$this->name = $name;
			$this->picture = $picture;
			$this->clues = $clues;
		}
	}

	// Define an array of objects, each representing an animal with its picture and clues
	$animals = array(
		new ZooAnimal("lion", "lion2.jpg", array("I am the king of the jungle", "I have a big mane", "I roar loudly")),
		new ZooAnimal("giraffe", "Giraffe2.jpg", array("I have a long neck", "I am the tallest land animal", "I have spots on my coat")),
		new ZooAnimal("penguin", "penguin2.jpg", array("I cannot fly", "I waddle when I walk", "I live in Antarctica"))
	);

	// Function to display the content of the table using table format from the array
	function displayTable($array) {
		echo "<table>";
		foreach ($array as $row) {
			echo "<tr>";
			echo "<td>" . $row->name . "</td>";
			echo "<td><img src='" . $row->picture . "' alt='" . $row->name . "'></td>";
			echo "<td>" . implode(", ", $row->clues) . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	// Call the function to display the table
	displayTable($animals);
?>
</body>
</html>