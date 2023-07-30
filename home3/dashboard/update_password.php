<?php
// Replace database credentials with your actual database connection details
include 'connect.php';

// Define variables to store error messages and status
$emailError = $passwordError = $confirmPasswordError = '';
$status = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Invalid email format';
    } else {
        // Check if the email exists in the database
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Validate password and confirm password
            if ($newPassword === $confirmPassword) {
                // Hash the new password before updating in the database
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password in the database
                $sql = "UPDATE users SET password = ? WHERE email = ?";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("ss", $hashedPassword, $email);
                if ($stmt->execute()) {
                    $status = 'Password updated successfully';
                    header('location:login.php');
                } else {
                    $status = 'Error updating password. Please try again later.';
                }
            } else {
                $confirmPasswordError = 'Passwords do not match';
            }
        } else {
            $emailError = 'Email not found';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - Update Password</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="update_password.css">
</head>
<body>
    <div class="container">
        <h2>Update Password</h2>
        <form action="update_password.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
                <span class="error"><?php echo $emailError; ?></span>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" required>
                <span class="error"><?php echo $confirmPasswordError; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Update Password">
            </div>
        </form>
        <div class="status"><?php echo $status; ?></div>
    </div>
</body>
</html>
