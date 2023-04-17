<!DOCTYPE html>
<html>
<head>
	<title>Form Submission Results</title>
</head>
<body>
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
      $username = $_POST["username"];
      $password = $_POST["password"];

      //use admin for username and admin123 for producer login.
      if ($username === "admin" && $password === "admin123") {
        header("Location: producer_home_page.html");
        exit();
      } else {
        $error_msg = "Incorrect username or password";
      }
    }
  ?>
</body>
</html>
