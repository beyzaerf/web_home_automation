<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  $username = $_POST["username"];
  $password = $_POST["password"];

  if ($username === "c" && $password === "123") {
    header("Location: consumer_home.html");
    exit();
  } 
  else if ($username === "p" && $password === "123"){
    header("Location: producer_home_page.html");
    exit();
  } else {
    $error_msg = "Incorrect username or password";
  }
}
?>
