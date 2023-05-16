<!DOCTYPE html>
<html>
<head>
	<title>Processed Information</title>
</head>
<body>
<?php
// Define an array of objects, each representing an animal with its picture and clues
$animals = [
    [
        'name' => 'lion',
        'picture' => 'lion2.jpg',
        'clues' => ["I am the king of the jungle", "I have a big mane", "I roar loudly"]
    ],
    [
        'name' => 'giraffe',
        'picture' => 'Giraffe2.jpg',
        'clues' => ["I have a long neck", "I am the tallest land animal", "I have spots on my coat"]
    ],
    [
        'name' => 'penguin',
        'picture' => 'penguin2.jpg',
        'clues' => ["I cannot fly", "I waddle when I walk", "I live in Antarctica"]
    ]
];

// Define a PHP class to maintain information about one row in one of the two tables in the previous part (part 3) in the project (Question 1).
class Animal {
    public $name;
    public $picture;
    public $clues;

    function __construct($name, $picture, $clues) {
        $this->name = $name;
        $this->picture = $picture;
        $this->clues = $clues;
    }
}

// Define an array of objects in part 1 to maintain information about all rows in the specified table.
$animalsTable = [
    new Animal('lion', 'lion2.jpg', ["I am the king of the jungle", "I have a big mane", "I roar loudly"]),
    new Animal('giraffe', 'Giraffe2.jpg', ["I have a long neck", "I am the tallest land animal", "I have spots on my coat"]),
    new Animal('penguin', 'penguin2.jpg', ["I cannot fly", "I waddle when I walk", "I live in Antarctica"])
];

// Use a function with appropriate iteration and selection statements to display the content of the table using a table format from the array.
function displayTable($table) {
    echo '<table>';
    echo '<tr><th>Name</th><th>Picture</th><th>Clues</th></tr>';
    foreach ($table as $row) {
        echo '<tr>';
        echo '<td>' . $row->name . '</td>';
        echo '<td><img src="' . $row->picture . '" alt="animal picture"></td>';
        echo '<td>' . implode(', ', $row->clues) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}

// Process received information from the form and display the result
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guess = $_POST['guess'];
    $animal = $animals[array_rand($animals)];
    if (strtolower($guess) === $animal['name']) {
        echo '<p>Correct! The animal is a ' . $animal['name'] . '.</p>';
    } else {
        echo '<p>Incorrect. Try again.</p>';
    }
}

// Display the table of animals
displayTable($animalsTable);
?>
</body>
</html>