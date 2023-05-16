<?php
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

$feedbackArray = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $age = test_input($_POST["age"]);
  $visitFrequency = test_input($_POST["visit-frequency"]);
  $likeMost = test_input($_POST["like-most"]);
  $improveOn = test_input($_POST["improve-on"]);
  $subscribe = isset($_POST["subscribe"]) ? "Yes" : "No";

  $feedback = new Feedback($name, $email, $age, $visitFrequency, $likeMost, $improveOn, $subscribe);
  array_push($feedbackArray, $feedback);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>