<!DOCTYPE html>
<html>
<head>
    <title>My Profile - Energy Monitoring System</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="profile.css">
    <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body>
    <!-- Include the top bar -->
    <div class="navbar">
        <!-- Company Logo -->
        <div class="logo">
            <a class="navbar-brand" href="u_dashboard.php">
      <img src="images\logo.jpg" alt="Logo" width="30" height="24">
    </a>
        </div>

        <!-- User Profile and Dropdown Menu -->
        <div class="user-menu">
            <img class="user-img" src="" alt="User Image">
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
        <!-- Profile page -->
        <div class="profile-container">
            <div class="profile-info">
                <?php
                    // Include database connection and other necessary files
                    include "connect.php";

                    // Start the session and retrieve the username of the logged-in user
                    session_start();
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];

                        // Fetch the user's data from the users table based on the username
                        $sql = "SELECT * FROM users WHERE uName = ?";
                        $stmt = $connect->prepare($sql);
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows == 1) {
                            $user = $result->fetch_assoc();
                            $fullName = $user['fullName'];
                            $email = $user['email'];
                            $role = $user['role'];
                            // You may also fetch the profile picture if available
                            // $profilePicture = $user['profilePicture'];

                            // Display the user's data
                            echo "<h2>My Profile</h2>";
                            echo "<div class='profile-info'>";
                            echo "<p><strong>Username:</strong> $username</p>";
                            echo "<p><strong>Full Name:</strong> $fullName</p>";
                            echo "<p><strong>Email:</strong> $email</p>";
                            echo "<p><strong>Role:</strong> $role</p>";
                            echo "</div>";
                        } else {
                            echo "User not found.";
                        }
                    } else {
                        echo "User not logged in.";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
