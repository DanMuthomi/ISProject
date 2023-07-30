<?php
include "connect.php";

session_start();

// Fetch data from the database for the specific user (logged-in user)
$uid = $_SESSION['uid'];
$sql = "SELECT time, longitude, latitude, energy FROM meters WHERE uid = ? ORDER BY time";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $uid);
$stmt->execute();
$result = $stmt->get_result();

// Create a CSV file and write the data to it
$filename = "energy_usage_data.csv";
$file = fopen($filename, "w");
fputcsv($file, array('Time', 'Longitude', 'Latitude', 'Energy (Watts)'));

while ($row = mysqli_fetch_assoc($result)) {
    $time = $row['time'];
    $longitude = $row['longitude'];
    $latitude = $row['latitude'];
    $energy = $row['energy'];
    fputcsv($file, array($time, $longitude, $latitude, $energy));
}

fclose($file);

// Download the CSV file
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/csv");
readfile($filename);

// Delete the CSV file
unlink($filename);
