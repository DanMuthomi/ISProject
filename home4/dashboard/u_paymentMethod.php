<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - Payment Method</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="pay.css">
</head>
<body>
    <div class="navbar">
        <!-- Company Logo -->
        <div class="logo">
            <a class="navbar-brand" href="u_dashboard.php">
                <img src="images\logo.jpg" alt="Logo" width="30" height="24">
            </a>
        </div>

        <!-- User Profile and Dropdown Menu -->
        <div class="user-menu">
            <img class="user-img" src="path/to/user-image.jpg" alt="User Image">
            <div class="dropdown-content">
                <a href="u_my_profile.php">My Profile</a>
                <a href="login.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="u_dashboard.php">Dashboard</a>
        <a href="u_analytics2.php?username=<?php echo urlencode($username); ?>">Analytics</a>
        <a href="u_paymentMethod.php">Payment Methods</a>
    </div>

    
<div class="content">
    <!-- Add the rest of your website content here -->
    <div class="payment-container">
        <h2>Payment Methods</h2>
        <table>
            <thead>
                <tr>
                    <th>Energy Used (kWh)</th>
                    <th>Amount per kWatt Used (KES)</th>
                    <th>Total Used (KES)</th>
                    <th>Energy Sold (kWh)</th>
                    <th>Amount per kWatt Sold (KES)</th>
                    <th>Total Sold (KES)</th>
                    <th>Total Amount (KES)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Include database connection and other necessary files
                    include "connect.php";

                    // Start the session and retrieve the username from the session
                    session_start();
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];

                        // Fetch the uid of the specific user based on the provided username
                        $sql_uid = "SELECT uid FROM users WHERE uName = ?";
                        $stmt_uid = $connect->prepare($sql_uid);
                        $stmt_uid->bind_param("s", $username);
                        $stmt_uid->execute();
                        $result_uid = $stmt_uid->get_result();

                        if ($result_uid->num_rows == 1) {
                            $user_uid = $result_uid->fetch_assoc();
                            $uid = $user_uid['uid'];

                            // Fetch energy data from the meters database table
                            $sql_energy = "SELECT SUM(CASE WHEN energy > 0 THEN energy ELSE 0 END) AS energyUsed, SUM(CASE WHEN energy < 0 THEN energy ELSE 0 END) AS energySold FROM meters WHERE uid = ?";
                            $stmt_energy = $connect->prepare($sql_energy);
                            $stmt_energy->bind_param("i", $uid); // Provide the user's uid
                            $stmt_energy->execute();
                            $result_energy = $stmt_energy->get_result();

                            if ($result_energy->num_rows == 1) {
                                $row_energy = $result_energy->fetch_assoc();
                                $energyUsed = $row_energy['energyUsed'];
                                $energySold = $row_energy['energySold'];

                                // Calculate total energy and total amount
                                $amountPerWattUsed = 0.1; // Example amount per watt used
                                $amountPerWattSold = 0.15; // Example amount per watt sold
                                $totalUsed = round($energyUsed * $amountPerWattUsed, 2);
                                $totalSold = round($energySold * $amountPerWattSold, 2);
                                $totalAmount = round($totalUsed + $totalSold, 2);

                                echo "<tr>
                                        <td>$energyUsed</td>
                                        <td>$amountPerWattUsed</td>
                                        <td>$totalUsed</td>
                                        <td>$energySold</td>
                                        <td>$amountPerWattSold</td>
                                        <td>$totalSold</td>
                                        <td>$totalAmount</td>
                                      </tr>";
                            } else {
                                echo "No energy data found for the user.";
                            }
                        } else {
                            echo "User not found.";
                        }
                    } else {
                        echo "Session not found.";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="coming-soon">
            <h2>Payment Methods Coming Soon!</h2>
            <p>We are currently working on adding a secure payment feature to enhance your energy monitoring experience. Stay tuned for updates!</p>
        </div>
</div>
</body>
</html>
