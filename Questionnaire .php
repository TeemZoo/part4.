<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Feedback Form Results</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      // Define a class to hold the feedback information
      class Feedback {
        public $name;
        public $email;
        public $age;
        public $visitFrequency;
        public $likeMost;
        public $improveOn;
        public $subscribe;

        public function __construct($name, $email, $age, $visitFrequency, $likeMost, $improveOn, $subscribe) {
          $this->name = $name;
          $this->email = $email;
          $this->age = $age;
          $this->visitFrequency = $visitFrequency;
          $this->likeMost = $likeMost;
          $this->improveOn = $improveOn;
          $this->subscribe = $subscribe;
        }
      }

      // Initialize an array to hold all the feedback data
      $feedbackData = array();

      // Retrieve the form data
      $name = $_POST["name"];
      $email = $_POST["email"];
      $age = $_POST["age"];
      $visitFrequency = $_POST["visit-frequency"];
      $likeMost = $_POST["like-most"];
      $improveOn = $_POST["improve-on"];
      $subscribe = isset($_POST["subscribe"]) ? "Yes" : "No";

      // Create a new Feedback object and add it to the array
      $feedback = new Feedback($name, $email, $age, $visitFrequency, $likeMost, $improveOn, $subscribe);
      array_push($feedbackData, $feedback);

      // Display the feedback data in a table
      echo "<h1>Feedback Form Results</h1>";
      echo "<table>";
      echo "<tr><th>Name</th><th>Email</th><th>Age</th><th>Visit Frequency</th><th>What do you like most?</th><th>What can we improve on?</th><th>Subscribe to our newsletter?</th></tr>";
      foreach ($feedbackData as $feedback) {
        echo "<tr><td>".$feedback->name."</td><td>".$feedback->email."</td><td>".$feedback->age."</td><td>".$feedback->visitFrequency."</td><td>".$feedback->likeMost."</td><td>".$feedback->improveOn."</td><td>".$feedback->subscribe."</td></tr>";
      }
      echo "</table>";
    ?>
  </body>
</html>
