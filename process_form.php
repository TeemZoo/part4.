<?php
  require_once('Animal.php'); // Include the Animal class

  // Get the submitted form data
  $animalName = $_POST['animalName'];
  $species = $_POST['species'];
  $habitat = $_POST['habitat'];
  $diet = $_POST['diet'];
  $image = $_POST['image'];

  // Create a new animal object with the submitted data
  $newAnimal = new Animal($animalName, $species, $habitat, $diet, $image);

  // Add the new animal to the array
  $animalArray = unserialize(file_get_contents('animalData.txt'));
  $animalArray[] = $newAnimal;
  file_put_contents('animalData.txt', serialize($animalArray));

  // Redirect back to the original page
  header('Location: index.html');
?>

<?php
  require_once('Animal.php'); // Include the Animal class

  // Get the submitted search term
  $searchTerm = $_POST['searchTerm'];

  // Search for animals in the array that match the search term
  $animalArray = unserialize(file_get_contents('animalData.txt'));
  $searchResults = array_filter($animalArray, function($animal) use ($searchTerm) {
    return (
      stripos($animal->animalName, $searchTerm) !== false ||
      stripos($animal->species, $searchTerm) !== false ||
      stripos($animal->habitat, $searchTerm) !== false ||
      stripos($animal->diet, $searchTerm) !== false
    );
  });

  // Create an HTML table to display the search results
  $table = '<table>';
  $table .= '<thead><tr><th>Animal</th><th>Species</th><th>Habitat</th><th>Diet</th><th>Image</th></tr></thead>';
  $table .= '<tbody>';
  foreach ($searchResults as $animal) {
    $table .= '<tr>';
    $table .= '<td>' . $animal->animalName . '</td>';
    $table .= '<td>' . $animal->species . '</td>';
    $table .= '<td>' . $animal->habitat . '</td>';
    $table .= '<td>' . $animal->diet . '</td>';
    $table .= '<td><img src="' . $animal->image . '" alt="' . $animal->animalName . '"></td>';
    $table .= '</tr>';
  }
  $table .= '</tbody>';
  $table .= '</table>';

  // Return the HTML table as the search result
  echo $table;
?>