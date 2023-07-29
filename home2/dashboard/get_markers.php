<?php
include "connect.php";

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $markers = array();

    $sql = "SELECT energy, latitude, longitude, time FROM meters WHERE uid = '$uid'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $markers[] = array(
                'energy' => $row['energy'],
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude'],
                'time' => $row['time']
            );
        }
    }

    echo json_encode($markers);
}
?>
