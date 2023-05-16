<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Animal Information - Process Form</title>
</head>
<body>
  <?php
    // Define Animal class
    class Animal {
      public $animalName;
      public $species;
      public $habitat;
      public $diet;
      public $image;

      function __construct($animalName, $species, $habitat, $diet, $image) {
        $this->animalName = $animalName;
        $this->species = $species;
        $this->habitat = $habitat;
        $this->diet = $diet;
        $this->image = $image;
      }
    }

    // Define initial array of animals
    $animalArray = array(
      new Animal("Lion", "Panthera leo", "Savanna", "Meat", "lion.jpg"),
      new Animal("Elephant", "Loxodonta africana", "Grasslands and forests", "Herbivore", "elephant.jpg"),
      new Animal("Giraffe", "Giraffa camelopardalis", "Savanna", "Herbivore", "giraffe.jpg"),
      new Animal("Monkey", "Various", "Tropical forests", "Various", "monkey.jpg")
    );

    // Check if form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Retrieve form data
      $animalName = $_POST['animalName'];
      $species = $_POST['species'];
      $habitat = $_POST['habitat'];
      $diet = $_POST['diet'];
      $image = $_POST['image'];

      // Create new Animal object and add to array
      $newAnimal = new Animal($animalName, $species, $habitat, $diet, $image);
      array_push($animalArray, $newAnimal);

      // Confirm successful addition of animal
      echo '<p>Animal added successfully:</p>';
      echo '<ul>';
      echo '<li>Name: ' . $newAnimal->animalName . '</li>';
      echo '<li>Species: ' . $newAnimal->species . '</li>';
      echo '<li>Habitat: ' . $newAnimal->habitat . '</li>';
      echo '<li>Diet: ' . $newAnimal->diet . '</li>';
      echo '<li>Image: ' . $newAnimal->image . '</li>';
      echo '</ul>';
    }
  ?>

  <h2>Animal Information</h2>

  <form method="post" action="process_form.php">
    <label for="animalName">Animal:</label>
    <input type="text" id="animalName" name="animalName" required>
    <br>
    <label for="species">Species:</label>
    <input type="text" id="species" name="species" required>
    <br>
    <label for="habitat">Habitat:</label>
    <input type="text" id="habitat" name="habitat" required>
    <br>
    <label for="diet">Diet:</label>
    <input type="text" id="diet" name="diet" required>
    <br>
    <label for="image">Image:</label>
    <input type="text" id="image" name="image" required>
    <br>
    <input type="submit" value="Add Animal">
  </form>

  <h2>Animal Information</h2>

  <?php
    // Display all animals in array
    foreach ($animalArray as $animal) {
      echo '<div>';
      echo '<h3>' . $animal->animalName . '</h3>';
      echo '<img src="' . $animal->image . '" alt="' . $animal->animalName . '">';
      echo '<ul>';
      echo '<li>Species: ' . $animal->species . '</li>';
      echo '<li>Habitat: ' . $animal->habitat . '</li>';
      echo '<li>Diet: ' . $animal->diet . '</li>';
      echo '</ul>';
      echo '</div>';
    }
  ?>
</body>
</html> 