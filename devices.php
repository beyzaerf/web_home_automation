<?php

function fetchDeviceDataFromDatabase()
{
    $host = '127.0.0.1';
    $dbname = 'autohome';
    $username = 'root';
    $password = '';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $stmt = $pdo->prepare("SELECT * FROM devices");
    $stmt->execute();

    $deviceData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $deviceData;
}

$deviceData = fetchDeviceDataFromDatabase();
?>

<div class="container py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto" data-aos="fade" data-aos-duration="2000">
            <h2>BEDROOM DEVICES</h2>
            <p>Discover a multitude of smart devices that are designed to work in harmony with our smart home system.</p>
        </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <?php foreach ($deviceData as $device) { ?>
            <div class="col" style="position: relative;">
                <div><a href="#"><img class="rounded img-fluid d-block w-100 fit-cover" data-bss-hover-animate="pulse" style="height: 200px;" src="assets/img/<?php echo $device['image']; ?>"></a>
                    <div class="py-4">
                        <h4><?php echo $device['name']; ?></h4>
                        <p>Status: <?php echo $device['status']; ?></p>
                        <?php if ($device['type'] == 'Air Conditioner') { ?>
                            <p>Temperature: <?php echo $device['temperature']; ?></p>
                            <p>Mode: <?php echo $device['mode']; ?></p>
                            <p>Fan Speed: <?php echo $device['fan_speed']; ?></p>
                        <?php } elseif ($device['type'] == 'Lights') { ?>
                            <p>Intensity: <?php echo $device['intensity']; ?></p>
                            <p>Color: <?php echo $device['color']; ?></p>
                        <?php } elseif ($device['type'] == 'Robot Vacuum Cleaner') { ?>
                            <p>Mode: <?php echo $device['mode']; ?></p>
                            <p>Intensity: <?php echo $device['intensity']; ?></p>
                            <p>Battery: <?php echo $device['battery']; ?></p>
                        <?php } elseif ($device['type'] == 'Air Purifier') { ?>
                            <p>Mode: <?php echo $device['mode']; ?></p>
                            <p>Filtration Level: <?php echo $device['filtration_level']; ?></p>
                            <p>Ionizer: <?php echo $device['ionizer']; ?></p>
                        <?php } elseif ($device['type'] == 'Window Sensor') { ?>
                            <p>Status: <?php echo $device['status']; ?></p>
                        <?php } elseif ($device['type'] == 'Security Alarm') { ?>
                            <p>Status: <?php echo $device['status']; ?></p>
                            <p>Volume: <?php echo $device['volume']; ?></p>
                        <?php } elseif ($device['type'] == 'Door Sensor') { ?>
                            <p>Status: <?php echo $device['status']; ?></p>
                        <?php } elseif ($device['type'] == 'Motion Sensor') { ?>
                            <p>Motion: <?php echo $device['motion']; ?></p>
                        <?php } elseif ($device['type'] == 'Thermostat') { ?>
                            <p>Temperature: <?php echo $device['temperature']; ?></p>
                            <p>Mode: <?php echo $device['mode']; ?></p>
                            <p>Fan Speed: <?php echo $device['fan_speed']; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
