
<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - View Accounts</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="view.css">
</head>
<body>
    <div class="navbar">
        <!-- Company Logo -->
        <div class="logo">
            <a class="navbar-brand" href="t_dashboard.php">
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
        <a href="t_dashboard.php">Dashboard</a>
        <a href="t_analytics.php">Analytics</a>
        <a href="t_paymentMethod.php">Payment Methods</a>
        <a href="t_createAccount.php">Create Accounts</a>
        <a href="t_viewAccounts.php">View Accounts</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- View Accounts Table -->
        <h2>View Accounts</h2>
        <table class="accounts-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Role</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'connect.php';
                    $sql = "SELECT * FROM users WHERE role = 'USER'"; // Modify the SQL query to filter by role 'USER'
                    $result = mysqli_query($connect, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['uid'];
                            $username = $row['uName'];
                            $fullname = $row['fullName'];
                            $email = $row['email'];
                            $role = $row['role'];
                            echo "<tr>
                            <th scope='row'>$id</th>
                            <td>$username</td>
                            <td>$fullname</td>
                            <td>$email</td>
                            <td>$role</td>
                            <td><button><a href='update.php?updateid=$id'>Update</a></button></td>
                            </tr>
                            ";
                        }
                    }
                ?>
                <!-- Add more rows for other accounts -->
            </tbody>
        </table>
    </div>

</body>
</html>