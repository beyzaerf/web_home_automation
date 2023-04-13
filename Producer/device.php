<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$device = $_POST['device'];
	$command = $_POST['command'];
	
	echo "Device: $device\n";
	echo "Command: $command\n";
}
?>
