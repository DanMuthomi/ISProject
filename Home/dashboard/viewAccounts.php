<!DOCTYPE html>
<html>
<head>
    <title>View Accounts - Energy Monitoring System</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <style>
        /* Add your CSS styles for the navigation bar here */
        .navbar {
            background-color: rgb(50, 229, 200);
            color: white;
            display: flex;
            justify-content: space-between;
            padding: 10px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }

        .user-menu {
            position: relative;
            display: inline-block;
        }

        .user-img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .user-menu:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #c0eee7;
        }

        /* Sidebar styling */
        .sidebar {
            height: 100%;
            width: 250px;
            background-color: #c0eee7;
            padding-top: 20px;
            position: fixed;
            top: 60px; /* Adjust the top position to leave space for the navigation bar */
            left: 0;
        }

        .sidebar a {
            padding: 10px;
            display: block;
            text-decoration: none;
            color: #333;
        }

        .sidebar a:hover {
            background-color: rgb(50, 229, 200);
        }

        /* Adjust content area to prevent overlapping with sidebar */
        .content {
            margin-top: 60px; /* Adjust the top margin to leave space for the navigation bar */
            margin-left: 260px; /* Adjust the left margin to accommodate the sidebar width */
            padding: 20px;
        }

        /* Table styles */
        .accounts-table {
            width: 100%;
            border-collapse: collapse;
        }

        .accounts-table th,
        .accounts-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .accounts-table th {
            background-color: rgb(50, 229, 200);
            color: white;
        }

        .accounts-table tr:hover {
            background-color: #f2f2f2;
        }

        /* Form styles */
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group select {
            cursor: pointer;
        }

        .form-group input[type="submit"] {
            background-color: rgb(50, 229, 200);
            color: white;
            cursor: pointer;
        }
    </style>
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
        <a href="#">Analytics</a>
        <a href="#">Payment Methods</a>
        <a href="createAccount.php">Create Accounts</a>
        <a href="viewAccounts.php">View Accounts</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- View Accounts Table -->
        <h2>View Accounts</h2>
        <table class="accounts-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Role</th>
                    <th>Meter ID</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data (replace this with actual data from the database) -->
                <tr>
                    <td>john_doe</td>
                    <td>John Doe</td>
                    <td>john.doe@example.com</td>
                    <td>USER</td>
                    <td>Meter123</td>
                    <td><a href="#">Update</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
                <tr>
                    <td>jane_smith</td>
                    <td>Jane Smith</td>
                    <td>jane.smith@example.com</td>
                    <td>ADMIN</td>
                    <td>Meter456</td>
                    <td><a href="#">Update</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
                <!-- Add more rows for other accounts -->
            </tbody>
        </table>
    </div>

</body>
</html>
