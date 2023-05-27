<?php

// burada database connection yapılacak
// .php dosyası submit butonuna bağlanacak


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    function sanitizeInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
  }

  $device1_temperature = sanitizeInput($_POST['device1-temperature']);
  $device1_mode = sanitizeInput($_POST['device1-mode']);
  $device1_fan_speed = sanitizeInput($_POST['device1-fan-speed']);

  $device2_intensity = sanitizeInput($_POST['device2-intensity']);
  $device2_color = sanitizeInput($_POST['device2-color']);
  $device2_state = sanitizeInput($_POST['device2-state']);

  $device3_mode = sanitizeInput($_POST['device3-mode']);
  $device3_intensity = sanitizeInput($_POST['device3-intensity']);
  $device3_battery = sanitizeInput($_POST['device3-battery']);

  $device4_mode = sanitizeInput($_POST['device4-mode']);
  $device4_filtration = sanitizeInput($_POST['device4-filtration']);
  $device4_ionizer = sanitizeInput($_POST['device4-ionizer']);

  $device5_status = sanitizeInput($_POST['device5-status']);

  $device6_status = sanitizeInput($_POST['device6-status']);
  $device6_volume = sanitizeInput($_POST['device6-volume']);

  $device7_status = sanitizeInput($_POST['device7-status']);

  $device8_motion = sanitizeInput($_POST['device8-motion']);

  $device9_temperature = sanitizeInput($_POST['device9-temperature']);
  $device9_mode = sanitizeInput($_POST['device9-mode']);
  $device9_fan_speed = sanitizeInput($_POST['device9-fan-speed']);

  $sql = "INSERT INTO device_parameters (device_name, temperature, mode, fan_speed)
          VALUES ('Air Conditioner', $device1_temperature, '$device1_mode', '$device1_fan_speed')";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO device_parameters (device_name, intensity, color, state)
          VALUES ('Lights', $device2_intensity, '$device2_color', '$device2_state')";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO device_parameters (device_name, mode, intensity, battery)
          VALUES ('Robot Vacuum Cleaner', '$device3_mode', $device3_intensity, $device3_battery)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO device_parameters (device_name, mode, filtration_level, ionizer)
          VALUES ('Air Purifier', '$device4_mode', $device4_filtration, '$device4_ionizer')";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO device_parameters (device_name, status)
          VALUES ('Window Sensor', '$device5_status')";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO device_parameters (device_name, status, volume)
          VALUES ('Security Alarm', '$device6_status', $device6_volume)";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO device_parameters (device_name, status)
          VALUES ('Door Sensor', '$device7_status')";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO device_parameters (device_name, motion_detected)
          VALUES ('Motion Sensor', '$device8_motion')";
  mysqli_query($conn, $sql);

  $sql = "INSERT INTO device_parameters (device_name, temperature, mode, fan_speed)
          VALUES ('Thermostat', $device9_temperature, '$device9_mode', '$device9_fan_speed')";
  mysqli_query($conn, $sql);

  mysqli_close($conn);

  echo "Data inserted successfully!";
}
?>
