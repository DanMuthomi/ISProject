<?php
include "connect.php";

// Function to generate random float numbers
function randomFloat($min, $max) {
    return ($min + lcg_value() * (abs($max - $min)));
}

// Number of meters and users
$numMeters = 10;

// Define the latitude and longitude for all meters (approximately in Nairobi, Kenya)
$latitudeNairobi = -1.2921;
$longitudeNairobi = 36.8219;

// Start time for each meter
$startTime = strtotime('2023-07-27 00:00:00');
$endTime = $startTime + (3 * 60 * 60); // 3 hours in seconds

// Fetch the uids for users with role 'USER' from the users table
$uids = array();
$sqlUsers = "SELECT uid FROM users WHERE role = 'USER'";
$resultUsers = mysqli_query($connect, $sqlUsers);

if ($resultUsers) {
    while ($row = mysqli_fetch_assoc($resultUsers)) {
        $uids[] = $row['uid'];
    }
}

// Loop through meters and generate data for each user
for ($mid = 1; $mid <= $numMeters; $mid++) {
    // Get the uid for each meter from the list of uids
    $uidIndex = ($mid - 1) % count($uids);
    $uid = $uids[$uidIndex];

    // Start the time at the beginning for each meter
    $currentTime = $startTime;

    // Variables for simulating solar energy generation and grid consumption
    $solarCapacity = 1000; // Max solar energy generation capacity (positive value)
    $gridConsumption = 500; // Max grid energy consumption (negative value)
    $timePeriod = $endTime - $startTime; // Total time period in seconds

    // Loop through the time range for each meter with entries every 5 minutes
    while ($currentTime <= $endTime) {
        // Calculate the ratio of elapsed time in the 3-hour period
        $timeElapsed = $currentTime - $startTime;
        $timeRatio = $timeElapsed / $timePeriod;

        // Simulate solar energy generation using a sine function with gradually increasing amplitude
        $solarEnergy = sin(2 * M_PI * $timeRatio) * $solarCapacity;

        // Calculate grid consumption as the complement of solar energy (positive to negative)
        $gridEnergy = -$gridConsumption - $solarEnergy;

        // Generate random energy consumption data (both positive and negative)
        $energyConsumption = randomFloat($gridEnergy, $solarEnergy);

        // Insert the data into the meters table
        $time = date('Y-m-d H:i:s', $currentTime);
        $sql = "INSERT INTO meters(mid, energy, latitude, longitude, time, uid)
                VALUES ('$mid', '$energyConsumption', '$latitudeNairobi', '$longitudeNairobi', '$time', '$uid')";
        mysqli_query($connect, $sql);

        // Move the time to the next entry (5 minutes)
        $currentTime += (5 * 60);
    }
}

echo "Random data generated and inserted into the database.";
?>
