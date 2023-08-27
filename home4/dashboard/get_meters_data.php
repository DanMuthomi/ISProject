<?php
// get_meters_data.php

// Assuming you have already started the session on the main page
// If not, you need to start the session here as well
// session_start();

// Include your database connection file
include "connect.php";

// Get the logged-in user's 'uid' from the session (assuming it's stored in the session variable 'uid')
if (!isset($_SESSION['uid'])) {
    // Redirect to login page or handle the case when a user is not logged in
    // For example:
    // header("Location: login.php");
    exit();
}

$uid = $_SESSION['uid'];

// Fetch data from the meters table for the logged-in user
$sql = "SELECT time, energy FROM meters WHERE uid = '$uid'";
$result = mysqli_query($connect, $sql);

if (!$result) {
    // Handle database error if needed
    // For example:
    // echo json_encode(["error" => "Failed to fetch data from the database."]);
    exit();
}

// Prepare arrays to store the data for charting
$timeData = [];
$energyData = [];

// Loop through the fetched rows and store data in the arrays
while ($row = mysqli_fetch_assoc($result)) {
    $timeData[] = $row['time'];
    $energyData[] = $row['energy'];
}

// Close the database connection
mysqli_close($connect);

// Prepare the data to be sent back as JSON
$data = [
    "timeData" => $timeData,
    "energyData" => $energyData
];

// Send the data back as JSON
header("Content-Type: application/json");
echo json_encode($data);
