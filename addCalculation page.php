<!DOCTYPE html>
<html>
  <head>
    <title>Zoo Ticket Calculator - PHP version</title>
    <style>
        /* CSS styles here */
    </style>
  </head>
  <body>
    <?php
      // Define the age group class
      class AgeGroup {
        public $name;
        public $price;
        public $discount;
        
        public function __construct($name, $price, $discount) {
          $this->name = $name;
          $this->price = $price;
          $this->discount = $discount;
        }
      }
      
      // Define the age groups array
      $ageGroups = array(
        new AgeGroup("Less than 12 years old", 0, 0),
        new AgeGroup("Between 13 and 18 years old", 5, 0.3),
        new AgeGroup("Between 19 and 59 years old", 10, 0),
        new AgeGroup("Greater than 60 years old", 5, 0.4)
      );
      
      // Get the form data
      $ageGroup1 = $_POST["age-group-1"];
      $ageGroup2 = $_POST["age-group-2"];
      $ageGroup3 = $_POST["age-group-3"];
      $ageGroup4 = $_POST["age-group-4"];
      
      // Calculate the total cost
      $totalCost = 0;
      foreach ($ageGroups as $ageGroup) {
        switch ($ageGroup->name) {
          case "Less than 12 years old":
            // they get in for free, so no cost added
            break;
          case "Between 13 and 18 years old":
            // they get 30% discount
            $totalCost += ($ageGroup2 * $ageGroup->price) * (1 - $ageGroup->discount);
            break;
          case "Between 19 and 59 years old":
            // they pay full price
            $totalCost += $ageGroup3 * $ageGroup->price;
            break;
          case "Greater than 60 years old":
            // they get 40% discount
            $totalCost += ($ageGroup4 * $ageGroup->price) * (1 - $ageGroup->discount);
            break;
          default:
            break;
        }
      }
      
      // Display the total cost
      echo "<h2>Total Cost: <span>" . $totalCost . " OR</span></h2>";
      
      // Display the price table
      echo "<h2>Price Table:</h2>";
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>Age Group</th>";
      echo "<th>Ticket Price</th>";
      echo "<th>Discount</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      foreach ($ageGroups as $ageGroup) {
        echo "<tr>";
        echo "<td>" . $ageGroup->name . "</td>";
        echo "<td>" . $ageGroup->price . "</td>";
        echo "<td>" . ($ageGroup->discount * 100) . "%</td>";
        echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
    ?>
  </body>
</html>
