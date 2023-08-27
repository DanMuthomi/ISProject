<?php
    include "connect.php";

    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        $sql = "SELECT uid FROM users WHERE uName = '$username'";
        $result = mysqli_query($connect, $sql);
        $userid = '';
        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $userid = $row['uid'];
        }
        echo $userid;
    }
?>
