<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Welcome, Producer!</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/aos.min.css">
    <link rel="stylesheet" href="assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery-baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                    </svg></span><span>AutoHome</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="producer_home_page.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                </ul><a class="btn btn-primary ms-md-2" role="button" href="login.php">Logout</a>
            </div>
        </div>
    </nav>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Device Parameter</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <h1>Add Device Parameter</h1>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $device_id = $_POST["device_id"];
        $parameter_name = $_POST["parameter_name"];
        $parameter_value = $_POST["parameter_value"];

        // Connect to your database
        $conn = mysqli_connect("localhost", "root", "", "autohome");

        if ($conn) {
            // Check if the device exists in the database
            $check_query = "SELECT * FROM device WHERE device_id = '$device_id'";
            $check_result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                // Device exists, save the parameter
                $insert_query = "INSERT INTO deviceparameter (device_id, parameter_name, parameter_value)
                                 VALUES ('$device_id', '$parameter_name', '$parameter_value')";

                if (mysqli_query($conn, $insert_query)) {
                    echo "<p>Device parameter saved successfully.</p>";
                } else {
                    echo "<p>Error: " . mysqli_error($conn) . "</p>";
                }
            } else {
                echo "<p>Error: Device not found.</p>";
            }

            mysqli_close($conn);
        } else {
            echo "<p>Error: Failed to connect to the database.</p>";
        }
    }
    ?>
    
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <label for="device_id">Device ID:</label>
        <input type="text" id="device_id" name="device_id" required>
        
        <label for="parameter_name">Parameter Name:</label>
        <input type="text" id="parameter_name" name="parameter_name" required>
        
        <label for="parameter_value">Parameter Value:</label>
        <input type="text" id="parameter_value" name="parameter_value" required>
        
        <button type="submit">Save Parameter</button>
    </form>
</body>
</html>
