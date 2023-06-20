<?php
$conn = mysqli_connect("localhost", "root", "", "autohome");

if ($conn) {
    $deviceId = $_POST['device_id'];
    $roomId = $_POST['room_id'];
    $deviceName = $_POST['device_name'];
    $deviceStatus = $_POST['device_status'];

    $query = "INSERT INTO Device (device_id, room_id, device_name, device_status) VALUES ('$deviceId', '$roomId', '$deviceName', '$deviceStatus')";

    if (mysqli_query($conn, $query)) {
        echo "Device added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
