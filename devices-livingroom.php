<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "autohome";
 $conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$tableNames = ['air_conditioner', 'lights', 'robot_vacuum_cleaner', 'air_purifier']; 
$columns = ['id', 'name', 'status', 'type', 'temperature', 'mode', 'fan_speed', 'intensity', 'color', 'battery', 'filtration_level', 'ionizer', 'motion'];

$fetchData = [];

foreach ($tableNames as $tableName) {
    $data = fetch_data($db, $tableName, $columns);
    $fetchData[$tableName] = $data;
}
function fetch_data($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "Columns Name must be defined in an indexed array";
    } elseif (empty($tableName)) {
        $msg = "Table Name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY id DESC";
        $result = $db->query($query);

        if ($result == true) {
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg = $row;
            } else {
                $msg = "No Data Found";
            }
        } else {
            $msg = mysqli_error($db);
        }
    }
    return $msg;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/aos.min.css">
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
            <div class="col-md-8 col-xl-6 text-center mx-auto" data-aos="fade" data-aos-duration="2000">
                <h2>LIVING ROOM DEVICES</h2>
                <p>Discover a multitude of smart devices that are designed to work in harmony with our smart home system.</p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col" style="position: relative;">
                <div><a href="#"><img class="rounded img-fluid d-block w-100 fit-cover" data-bss-hover-animate="pulse" style="height: 200px;" src="assets/img/light.jpeg"></a>
                    <div class="py-4">
                        <h4>Lights</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div><a href="#"><img class="rounded img-fluid d-block w-100 fit-cover" data-bss-hover-animate="pulse" style="height: 200px;" src="assets/img/kapiii.jpg"></a>
                    <div class="py-4">
                        <h4>Smart Lock</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div><a href="#"><img class="rounded img-fluid d-block w-100 fit-cover" data-bss-hover-animate="pulse" style="height: 200px;" src="assets/img/klima.jpg"></a>
                    <div class="py-4">
                        <h4>Air Conditioner</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div><a href="#"><img class="rounded img-fluid d-block w-100 fit-cover" data-bss-hover-animate="pulse" style="height: 200px;" src="assets/img/airp.jpg"></a>
                    <div class="py-4">
                        <h4>Air Purifier</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div><a href="#"><img class="rounded img-fluid d-block w-100 fit-cover" data-bss-hover-animate="pulse" style="height: 200px;" src="assets/img/blinds.jpg"></a>
                    <div class="py-4">
                        <h4>Blinds</h4>
                    </div>
                </div>
            </div>
            <div class="col">
                <div><a href="#"><img class="rounded img-fluid d-block w-100 fit-cover" data-bss-hover-animate="pulse" style="height: 200px;" src="assets/img/robot.jpg"></a>
                    <div class="py-4">
                        <h4>Robot Cleaner</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/aos.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Lightbox-Gallery-baguetteBox.min.js"></script>
    <script src="assets/js/Lightbox-Gallery.js"></script>
</body>

</html>