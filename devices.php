<?php
// Fetch room name from the query string
if (isset($_GET['room'])) {
    $roomName = $_GET['room'];
} else {
    echo "Room parameter not specified.";
    exit;
}

// Fetch device data for the specified room from the database
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

// Retrieve device data for the specified room from the database
$sql = "SELECT Device.device_name, DeviceParameter.parameter_name, DeviceParameter.parameter_value
        FROM Device
        INNER JOIN DeviceParameter ON Device.device_id = DeviceParameter.device_id
        WHERE Device.room_id = (SELECT room_id FROM Room WHERE room_name = '$roomName')";
$result = $conn->query($sql);

// Prepare the device parameter list HTML
$deviceParameterList = '<h2>Devices and Parameters in ' . $roomName . '</h2>';
if ($result->num_rows > 0) {
    $currentDevice = '';
    while ($row = $result->fetch_assoc()) {
        $deviceName = $row['device_name'];
        $parameterName = $row['parameter_name'];
        $parameterValue = $row['parameter_value'];

        if ($deviceName !== $currentDevice) {
            // Display device name if it is different from the previous one
            $deviceParameterList .= '<h3>' . $deviceName . '</h3>';
            $currentDevice = $deviceName;
        }

        // Display parameter name and value
        $deviceParameterList .= '<p>' . $parameterName . ': ' . $parameterValue . '</p>';
    }
} else {
    $deviceParameterList .= '<p>No devices found.</p>';
}

// Close the database connection
$conn->close();

// Display the device parameter list HTML
echo $deviceParameterList;
?>
