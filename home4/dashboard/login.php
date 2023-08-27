<?php
// Replace database credentials with your actual database connection details
include 'connect.php';

// Start the session
session_start();

// Check if the form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($password)) {
        // Prepare and execute the SQL query with a prepared statement
        $sql = "SELECT * FROM users WHERE uName = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            // Verify the password using PHP's password_verify() function
            if (password_verify($password, $user['password'])) {
                // Password matches, grant access to the user
                $_SESSION['uid'] = $user['uid']; // Add 'uid' to the session
                $_SESSION['username'] = $user['uName'];
                $_SESSION['user_role'] = $user['role'];
                // Redirect to the dashboard or any other secure page
                if ($_SESSION['user_role'] === 'ADMIN') {
                    header("Location: a_dashboard.php"); // Redirect to the Admin Dashboard page
                    exit();
                } 
                elseif ($_SESSION['user_role'] === 'TECHNICIAN') {
                    header("Location: t_dashboard.php"); // Redirect to the Technician Dashboard page
                    exit();
                } 
                elseif ($_SESSION['user_role'] === 'USER') {
                    header("Location: u_dashboard.php"); // Redirect to the User Dashboard page
                    exit();
                } 
            } 
            else {
                // Password is incorrect, display an error message
                $error = "Invalid username or password";
            }
        } else {
            // User not found, display an error message
            $error = "Invalid username or password";
        }
    } else {
        // Password field is empty, display an error message
        $error = "Please enter your password";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - Login</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="login.css">
    <!-- ... (existing CSS styles) ... -->
</head>
<body>
    <div class="navbar">
        <!-- Company Logo -->
        <!-- ... (existing code) ... -->
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Login Form -->
        <div class="login-container">
            <h2>Login to Your Account</h2>
            <form method="post" action="login.php">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="form-group">
                    <button type="submit">Login</button>
                </div>

                <?php
                // Display error message if present
                if (isset($error)) {
                    echo '<p style="color: red;">' . $error . '</p>';
                }
                ?>

                <a href="update_password.php" class="forgot-password">Forgot Password?</a>
            </form>
        </div>
    </div>

</body>
</html>
