<?php
session_start();

// Check if the user is logged in (by checking if $_SESSION['username'] is set)
if (!isset($_SESSION['username'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Retrieve the username from the session
$username = $_SESSION['username'];
$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - Home</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="dashboard.css">
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
            <img class="user-img" src="images\no_usr.png" alt="User Image">
            <div class="dropdown-content">
                <a href="u_my_profile.php">My Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="u_dashboard.php">Dashboard</a>
        <a href="u_analytics2.php?username=<?php echo urlencode($username); ?>">Analytics</a>
        <a href="u_paymentMethod.php">Payment Methods</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Welcome Message -->
        <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>Here's your personalized dashboard where you can monitor your renewable energy usage and savings.</p>
        <!-- Rest of the dashboard content goes here -->
    </div>


</body>
</html>