
<?php
// Replace database credentials with your actual database connection details
include 'connect.php';

// Check if the form is submitted
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to fetch user data based on the username
    $sql = "SELECT * FROM users WHERE uName = '$username'";
    $result = mysqli_query($connect, $sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verify the password using PHP's password_verify() function
        if (password_verify($password, $user['password'])) {
            // Password matches, grant access to the user
            // You can set session variables or redirect to a secure dashboard page
            session_start();
            $_SESSION['username'] = $user['username'];
            // Redirect to the dashboard or any other secure page
            header("Location: home.php");
            exit();
        } else {
            // Password is incorrect, display an error message
            $error = "Invalid username or password";
        }
    } else {
        // User not found, display an error message
        $error = "Invalid username or password";
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

                <a href="#" class="forgot-password">Forgot Password?</a>
            </form>
        </div>
    </div>

</body>
</html>

