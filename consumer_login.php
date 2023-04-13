<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $username = $_POST["username"];
  $password = $_POST["password"];

  //use asd for username and password for consumer login.
  if ($username === "asd" && $password === "asd") {
    header("Location: consumer_home.html");
    exit();
  } else {
    $error_msg = "Incorrect username or password";
  }
}
?>

