<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - Analytics</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="analytics.css">
</head>
<body>
    <!-- ... (existing code for the header and sidebar) ... -->
    <div class="content">
        <!-- Analytics page -->
        <div class="analytics-container">
            <h2>Energy Usage Analytics</h2>

            <!-- Table to display meter data -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                            <th>Energy (Watts)</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Add a link or button for downloading CSV -->
<div class="download-csv">
    <a href="download_data.php" class="btn btn-primary">Download CSV</a>
</div>

<?php
// analytics.php

// Include database connection and other necessary files
include "connect.php";

// Start the session and retrieve the username from the URL parameter
session_start();
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Fetch the uid of the specific user based on the provided username
    $sql = "SELECT uid FROM users WHERE uName = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $uid = $user['uid'];

        // Now you have the uid, use it to fetch data from the meters database for that user
        $sql = "SELECT * FROM meters WHERE uid = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("i", $uid);
        $stmt->execute();
        $result = $stmt->get_result();

        // Now you can use $result to display the data in a table or plot it in graphs
        // Now you can use $result to display the data in a table
echo "<h3>Energy Usage Data for User: $username</h3>";
echo "<table border='1'>
        <tr>
            <th>Time</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Energy (Watts)</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $time = $row['time'];
    $longitude = $row['longitude'];
    $latitude = $row['latitude'];
    $energy = $row['energy'];

    echo "<tr>
            <td>$time</td>
            <td>$longitude</td>
            <td>$latitude</td>
            <td>$energy</td>
          </tr>";
}

echo "</table>";

    } else {
        echo "User not found.";
    }
} else {
    echo "Username parameter not provided.";
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
