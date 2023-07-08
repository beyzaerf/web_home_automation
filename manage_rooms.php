<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rooms</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery-baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="path/to/your/stylesheet.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                    </svg></span><span>AutoHome</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="rooms.php">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link" href="alerts.html">Alerts</a></li>
                    <li class="nav-item"><a class="nav-link" href="statistics.html">Statistics</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                </ul><a class="btn btn-primary ms-md-2" role="button" href="index.html">Logout</a>
            </div>
        </div>
    </nav>
    <?php require_once 'db_connection.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Rooms</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .room-card {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .room-card h3 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 20px;
            color: #333333;
        }

        .room-card a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #0366d6;
        }

        .room-card a:hover {
            text-decoration: underline;
        }

        .add-remove-links {
            margin-top: 20px;
            text-align: center;
        }

        .add-remove-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #0366d6;
        }

        .add-remove-links a:hover {
            text-decoration: underline;
        }

        .paragraph {
            margin-bottom: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <?php
    // Query the database to retrieve rooms
    $roomSql = "SELECT * FROM Room";
    $roomResult = $conn->query($roomSql);

    // Check if any rooms exist
    if ($roomResult->num_rows > 0) {
        echo "<div class='container'>";
        while ($row = $roomResult->fetch_assoc()) {
            echo "<div class='room-card'>";
            echo "<h3>" . $row["room_name"] . "</h3>";
            echo "<a href='manage_devices.php?room_id=" . $row["RoomID"] . "'>Manage Devices</a>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No rooms found.</p>";
    }

    // Close the result set
    $roomResult->close();

    $conn->close();
    ?>
    <br>
    <p class="paragraph">Manage your rooms and devices:</p>

    <div class="add-remove-links">
        <a href="add_room.php">Add Room</a>
        <a href="remove_room.php">Remove Room</a>
    </div>
</body>
</html>


<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/Lightbox-Gallery-baguetteBox.min.js"></script>
<script src="assets/js/Lightbox-Gallery.js"></script>
</body>

</html>
