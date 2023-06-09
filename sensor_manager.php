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
	<title>Sensor Management</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		h1 {
			font-size: 28px;
			margin: 20px 0;
            text-align: center;
		}
        h2 {
            font-size: 28px;
            margin: 20px 0;
            text-align: center;
        }
		form {
            width: 80%;
            margin: 0 auto;
		}
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            width: 30%;
            text-align: left;
        }

		input[type="text"], input[type="number"], input[type="dropdown"] {
			padding: 8px;
			border: 1px solid #ccc;
			border-radius: 4px;
			margin-bottom: 10px;
			width: 100%;
			box-sizing: border-box;
		}
		input[type="submit"] {
			background-color: #0066cc;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #085eb5;
		}
		table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            margin-bottom: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #0066cc;
            color: #fff;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        tr:hover {
            background-color: #ddd;
        }
	</style>
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
<body>
    <h1>Sensor Management</h1>
    <form method="POST" action="add_device.php">
        <h2>Add Device</h2>
        <label for="device_id">Device ID:</label>
        <input type="text" id="device_id" name="device_id" required>
        <label for="room_id">Room Name:</label>
        <select id="room_id" name="room_id" required>
            <?php
            // Fetch room names from the database
            $conn = mysqli_connect("localhost", "root", "", "autohome");

            if ($conn) {
                $query = "SELECT * FROM Room";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['room_id'] . "'>" . $row['room_name'] . "</option>";
                }

                mysqli_close($conn);
            }
            ?>
        </select>
        <label for="device_name">Device Name:</label>
        <input type="text" id="device_name" name="device_name" required>
        <label for="device_status">Device Status:</label>
        <input type="text" id="device_status" name="device_status" required>
        <input type="submit" value="Add Device">
    </form>

    <table>
        <h2>Current Devices</h2>
        <tr>
            <th>Device ID</th>
            <th>Room Name</th>
            <th>Device Name</th>
            <th>Device Status</th>
        </tr>
        <?php
        // Fetch data from the database and populate the table rows dynamically
        $conn = mysqli_connect("localhost", "root", "", "autohome");

        if ($conn) {
            $query = "SELECT * FROM Device";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                // Fetch room name based on room ID
                $roomQuery = "SELECT room_name FROM Room WHERE room_id = " . $row['room_id'];
                $roomResult = mysqli_query($conn, $roomQuery);
                $roomRow = mysqli_fetch_assoc($roomResult);
                $roomName = $roomRow['room_name'];

                echo "<tr>";
                echo "<td>" . $row['device_id'] . "</td>";
                echo "<td>" . $roomName . "</td>";
                echo "<td>" . $row['device_name'] . "</td>";
                echo "<td>" . $row['device_status'] . "</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
        }
        ?>
    </table>
</body>
</html>

