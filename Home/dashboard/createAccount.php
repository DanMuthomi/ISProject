<!DOCTYPE html>
<html>
<head>
    <title>Create Accounts - Energy Monitoring System</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="create.css">
</head>
<body>
    <div class="navbar">
        <!-- Company Logo -->
        <div class="logo">
            <a class="navbar-brand" href="home.php">
                <img src="images\logo.jpg" alt="Logo" width="30" height="24">
            </a>
        </div>

        <!-- User Profile and Dropdown Menu -->
        <div class="user-menu">
            <img class="user-img" src="path/to/user-image.jpg" alt="User Image">
            <div class="dropdown-content">
                <a href="#">My Profile</a>
                <a href="#">Settings</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="home.php">Dashboard</a>
        <a href="#">Analytics</a>
        <a href="#">Payment Methods</a>
        <a href="createAccount.php">Create Accounts</a>
        <a href="viewAccounts.php">View Accounts</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Create Accounts Form -->
        <div class="form-container">
            <h2>Create Account</h2>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select id="role" name="role" required>
                        <option value="ADMIN">ADMIN</option>
                        <option value="TECHNICIAN">TECHNICIAN</option>
                        <option value="USER">USER</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="meterid">Meter ID</label>
                    <input type="text" id="meterid" name="meterid" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Create Account">
                </div>
            </form>
        </div>
    </div>

</body>
</html>
