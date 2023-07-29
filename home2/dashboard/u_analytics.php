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
                        <?php
// analytics.php

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Replace database credentials with your actual database connection details
include 'connect.php';

// Fetch data from the meters table for the logged-in user using 'uid'
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM meters WHERE uid = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();

// Fetch and store the data in an array
$metersData = array();
while ($row = $result->fetch_assoc()) {
    $metersData[] = $row;
}
?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
