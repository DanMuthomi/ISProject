
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "connect.php";

if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    
    // Fetch energy data from the meters table for the logged-in user
    $sql = "SELECT time, energy FROM meters WHERE uid = '$uid'";
    $result = mysqli_query($connect, $sql);

    $energyData = array();
    $timeData = array();

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $timeData[] = $row['time'];
            $energyData[] = $row['energy'];
        }
    }

    // Prepare the data as an associative array
    $data = array(
        "timeData" => $timeData,
        "energyData" => $energyData
    );

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // User not logged in, return an empty array as JSON
    header('Content-Type: application/json');
    echo json_encode(array());
}
?>
