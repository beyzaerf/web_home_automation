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
    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>ROOMS</h2>
                <p>Welcome to the Rooms page of your Smart Home System! Here you can view and manage all the rooms in your home, including their connected devices, settings, and preferences. </p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php
            // Fetch room data from the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "autohome";
    
            // Create a database connection
            $conn = new mysqli($servername, $username, $password, $dbname);
    
            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
            // Retrieve room data from the database
            $sql = "SELECT room_name FROM Room";
            $result = $conn->query($sql);
    
            // Display rooms dynamically
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $roomName = $row['room_name'];
            ?>
                    <div class="col">
                        <div>
                            <a href="#"><img class="rounded img-fluid d-block w-100 fit-cover" data-bss-hover-animate="pulse" style="height: 200px;" src="assets/img/<?php echo strtolower($roomName); ?>.jpg"></a>
                            <div class="py-4">
                                <h4><?php echo $roomName; ?></h4>
                                <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                <a class="btn btn-primary" role="button" onclick="openPopup('<?php echo $roomName; ?>')">Devices</a>
                                <script>
function openPopup(roomName) {
    var popup = window.open('', 'DevicePopup', 'width=600,height=400');
    popup.document.write('<html><head><title>Devices</title>');
    popup.document.write('<link rel="stylesheet" href="path/to/your/styles.css">'); // Replace with the path to your CSS file
    popup.document.write('</head><body>');
    popup.document.write('<div class="container py-4 py-xl-5">');
    popup.document.write('<div class="row mb-5">');
    popup.document.write('<div class="col-md-8 col-xl-6 text-center mx-auto">');
    popup.document.write('<h2>Loading devices...</h2>');
    popup.document.write('</div></div></div>');
    popup.document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>');
    popup.document.write('<script>');
    popup.document.write('$(document).ready(function() {');
    popup.document.write('$.ajax({');
    popup.document.write('url: "devices.php?room=' + encodeURIComponent(roomName) + '",');
    popup.document.write('success: function(data) {');
    popup.document.write('$(".container").html(data);');
    popup.document.write('}');
    popup.document.write('});');
    popup.document.write('});');
    popup.document.write('</script>');
    popup.document.write('</body></html>');
}
</script>

    
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No rooms found.";
            }
    
            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Lightbox-Gallery-baguetteBox.min.js"></script>
    <script src="assets/js/Lightbox-Gallery.js"></script>
</body>

</html>