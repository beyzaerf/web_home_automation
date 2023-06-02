<?php
// Retrieve the form data for Air Conditioner
$device1Temperature = $_POST['device1-temperature'];
$device1Mode = $_POST['device1-mode'];
$device1FanSpeed = $_POST['device1-fan-speed'];
$device1Room = $_POST['device1-room'];
$device1EnergyUsage = $_POST['device1-energy-usage'];

// Retrieve the form data for Lights
$device2Intensity = $_POST['device2-intensity'];
$device2Color = $_POST['device2-color'];
$device2State = $_POST['device2-state'];
$device2Room = $_POST['device2-room'];
$device2EnergyUsage = $_POST['device2-energy-usage'];

// Retrieve the form data for Robot Vacuum Cleaner
$device3Mode = $_POST['device3-mode'];
$device3Intensity = $_POST['device3-intensity'];
$device3Battery = $_POST['device3-battery'];
$device3Room = $_POST['device3-room'];
$device3EnergyUsage = $_POST['device3-energy-usage'];

// Retrieve the form data for Air Purifier
$device4Mode = $_POST['device4-mode'];
$device4Filtration = $_POST['device4-filtration'];
$device4Ionizer = $_POST['device4-ionizer'];
$device4Room = $_POST['device4-room'];
$device4EnergyUsage = $_POST['device4-energy-usage'];

// Retrieve the form data for Window Sensor
$device5Status = $_POST['device5-status'];
$device5Room = $_POST['device5-room'];
$device5EnergyUsage = $_POST['device5-energy-usage'];

// Retrieve the form data for Security Alarm
$device6Status = $_POST['device6-status'];
$device6Volume = $_POST['device6-volume'];
$device6Room = $_POST['device6-room'];
$device6EnergyUsage = $_POST['device6-energy-usage'];

// Retrieve the form data for Door Sensor
$device7Status = $_POST['device7-status'];
$device7Room = $_POST['device7-room'];
$device7EnergyUsage = $_POST['device7-energy-usage'];

// Retrieve the form data for Motion Sensor
$device8Motion = $_POST['device8-motion'];
$device8Room = $_POST['device8-room'];
$device8EnergyUsage = $_POST['device8-energy-usage'];


// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "autohome";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the Air Conditioner table
$sql1 = "INSERT INTO air_conditioner (temperature, mode, fan_speed, room, energy_usage)
         VALUES ('$device1Temperature', '$device1Mode', '$device1FanSpeed', '$device1Room', '$device1EnergyUsage')";

if ($conn->query($sql1) === TRUE) {
    echo "Data inserted successfully for Air Conditioner.<br>";
} else {
    echo "Error inserting data for Air Conditioner: " . $conn->error . "<br>";
}

// Insert data into the Lights table
$sql2 = "INSERT INTO lights (intensity, color, state, room, energy_usage)
         VALUES ('$device2Intensity', '$device2Color', '$device2State', '$device2Room', '$device2EnergyUsage')";

if ($conn->query($sql2) === TRUE) {
    echo "Data inserted successfully for Lights.<br>";
} else {
    echo "Error inserting data for Lights: " . $conn->error . "<br>";
}

// Insert data into the Robot Vacuum Cleaner table
$sql3 = "INSERT INTO robot_vacuum_cleaner (mode, intensity, battery, room, energy_usage)
         VALUES ('$device3Mode', '$device3Intensity', '$device3Battery', '$device3Room', '$device3EnergyUsage')";

if ($conn->query($sql3) === TRUE) {
    echo "Data inserted successfully for Robot Vacuum Cleaner.<br>";
} else {
    echo "Error inserting data for Robot Vacuum Cleaner: " . $conn->error . "<br>";
}

// Insert data into the Air Purifier table
$sql4 = "INSERT INTO air_purifier (mode, filtration_level, ionizer, room, energy_usage)
         VALUES ('$device4Mode', '$device4Filtration', '$device4Ionizer', '$device4Room', '$device4EnergyUsage')";

if ($conn->query($sql4) === TRUE) {
    echo "Data inserted successfully for Air Purifier.<br>";
} else {
    echo "Error inserting data for Air Purifier: " . $conn->error . "<br>";
}

// Insert data into the Window Sensor table
$sql5 = "INSERT INTO window_sensor (status, room, energy_usage)
         VALUES ('$device5Status', '$device5Room', '$device5EnergyUsage')";

if ($conn->query($sql5) === TRUE) {
    echo "Data inserted successfully for Window Sensor.<br>";
} else {
    echo "Error inserting data for Window Sensor: " . $conn->error . "<br>";
}

// Insert data into the Security Alarm table
$sql6 = "INSERT INTO security_alarm (status, volume, room, energy_usage)
         VALUES ('$device6Status', '$device6Volume', '$device6Room', '$device6EnergyUsage')";

if ($conn->query($sql6) === TRUE) {
    echo "Data inserted successfully for Security Alarm.<br>";
} else {
    echo "Error inserting data for Security Alarm: " . $conn->error . "<br>";
}

// Insert data into the Door Sensor table
$sql7 = "INSERT INTO door_sensor (status, room, energy_usage)
         VALUES ('$device7Status', '$device7Room', '$device7EnergyUsage')";

if ($conn->query($sql7) === TRUE) {
    echo "Data inserted successfully for Door Sensor.<br>";
} else {
    echo "Error inserting data for Door Sensor: " . $conn->error . "<br>";
}

// Insert data into the Motion Sensor table
$sql8 = "INSERT INTO motion_sensor (motion_detected, room, energy_usage)
         VALUES ('$device8Motion', '$device8Room', '$device8EnergyUsage')";

if ($conn->query($sql8) === TRUE) {
    echo "Data inserted successfully for Motion Sensor.<br>";
} else {
    echo "Error inserting data for Motion Sensor: " . $conn->error . "<br>";
}

if ($conn->query($sql9) === TRUE) {
    echo "Data inserted successfully for Thermostat.<br>";
} else {
    echo "Error inserting data for Thermostat: " . $conn->error . "<br>";
}

// Close the database connection
$conn->close();
?>
