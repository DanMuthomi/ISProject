
<?php
    include "connect.php";
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Hash the password using bcrypt (password_hash function)
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users(uName,fullName,email,password,role) VALUES('$username','$fullname','$email','$hashedPassword','$role')";
        $result = mysqli_query($connect, $sql);
        if ($result){
            header("location:a_viewAccounts.php");
        }
        else{
            echo "Not registered";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - Create Accounts</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="create.css">
</head>
<body>
    <div class="navbar">
        <!-- Company Logo -->
        <div class="logo">
            <a class="navbar-brand" href="a_dashboard.php">
                <img src="images\logo.jpg" alt="Logo" width="30" height="24">
            </a>
        </div>

        <!-- User Profile and Dropdown Menu -->
        <div class="user-menu">
            <img class="user-img" src="path/to/user-image.jpg" alt="User Image">
            <div class="dropdown-content">
                <a href="#">My Profile</a>
                <a href="#">Settings</a>
                <a href="login.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="a_dashboard.php">Dashboard</a>
        <a href="a_analytics.php">Analytics</a>
        <a href="a_paymentMethod.php">Payment Methods</a>
        <a href="a_createAccount.php">Create Accounts</a>
        <a href="a_viewAccounts.php">View Accounts</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Create Accounts Form -->
        <?php
            $roles = array("ADMIN","TECHNICIAN");
        ?>
        <div class="form-container">
            <h2>Create Account</h2>
            <form action="createAccount.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" required>
                        <option>--Specify Role--</option>
                        <?php
                            foreach ($roles as $role) {
                                echo "<option>$role</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Create Account">
                </div>
            </form>
        </div>
    </div>

</body>
</html>