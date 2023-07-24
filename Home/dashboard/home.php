
<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - Home</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="home.css">
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
                <a href="login.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="home.php">Dashboard</a>
        <a href="#">Analytics</a>
        <a href="paymentMethod.php">Payment Methods</a>
        <a href="createAccount.php">Create Accounts</a>
        <a href="viewAccounts.php">View Accounts</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Add the rest of your website content here -->
        <!-- Welcome Message -->
        <h2>Welcome, <span id="user-name">John Doe</span>!</h2>
        <p>Here's your personalized dashboard where you can monitor your renewable energy usage and savings.</p>
    </div>

    <!-- JavaScript to get user's name and display in the welcome message -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Replace "John Doe" with the user's actual name or retrieve it dynamically from the server
            var userName = "John Doe";
            document.getElementById("user-name").textContent = userName;
        });
    </script>


</body>
</html>