<?php
// Define Animal class
class Animal {
  public $animalName;
  public $species;
  public $habitat;
  public $diet;
  public $image;

  public function __construct($animalName, $species, $habitat, $diet, $image) {
    $this->animalName = $animalName;
    $this->species = $species;
    $this->habitat = $habitat;
    $this->diet = $diet;
    $this->image = $image;
  }
}

// Initialize animal array with existing data
$animalArray = array(
  new Animal("Lion", "Panthera leo", "Savanna", "Meat", "lion.jpg"),
  new Animal("Elephant", "Loxodonta africana", "Grasslands and forests", "Herbivore", "elephant.jpg"),
  new Animal("Giraffe", "Giraffa camelopardalis", "Savanna", "Herbivore", "giraffe.jpg"),
  new Animal("Monkey", "Various", "Tropical forests", "Various", "monkey.jpg")
);

// Function to add an animal to the array
function addAnimal($animalArray) {
  // Get form data
  $animalName = $_POST['animalName'];
  $species = $_POST['species'];
  $habitat = $_POST['habitat'];
  $diet = $_POST['diet'];
  $image = $_POST['image'];

  // Create new Animal object
  $newAnimal = new Animal($animalName, $species, $habitat, $diet, $image);

  // Add new Animal object to array
  $animalArray[] = $newAnimal;

  // Return updated animal array
  return $animalArray;
}

// If form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check which form was submitted
  if (isset($_POST['addAnimal'])) {
    // Add animal to array
    $animalArray = addAnimal($animalArray);
  }
}

// Display animal table
echo '<table>';
echo '<thead><tr><th>Animal</th><th>Species</th><th>Habitat</th><th>Diet</th><th>Image</th></tr></thead>';
echo '<tbody>';
foreach ($animalArray as $animal) {
  echo '<tr>';
  echo '<td>' . $animal->animalName . '</td>';
  echo '<td>' . $animal->species . '</td>';
  echo '<td>' . $animal->habitat . '</td>';
  echo '<td>' . $animal->diet . '</td>';
  echo '<td><img src="' . $animal->image . '" alt="' . $animal->animalName . '"></td>';
  echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>

