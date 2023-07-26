<?php
    include "connect.php";

    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        $sql = "SELECT uName FROM users WHERE uName LIKE '%$username%'";
        $result = mysqli_query($connect, $sql);
        $suggestions = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $suggestions[] = $row['uName'];
            }
        }
        echo json_encode($suggestions);
    }
?>
