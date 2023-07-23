<!DOCTYPE html>
<html>
<head>
    <title>Static Navigation Bar with Sidebar</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="pay.css">
</head>
<body>
    <div class="navbar">
        <!-- Company Logo -->
        <div class="logo">
            <a class="navbar-brand" href="#">
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
        <a href="analytics.php">Analytics</a>
        <a href="paymentMethod.php">Payment Methods</a>
        <a href="createAccount.php">Create Accounts</a>
        <a href="viewAccounts.php">View Accounts</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Add the rest of your website content here -->
        <div class="coming-soon">
            <h2>Payment Feature Coming Soon!</h2>
            <p>We are currently working on adding a secure payment feature to enhance your energy monitoring experience. Stay tuned for updates!</p>
        </div>
    </div>
    </div>

</body>
</html>
