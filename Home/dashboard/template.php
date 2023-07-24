
<!DOCTYPE html>
<html>
<head>
    <title>Static Navigation Bar with Sidebar</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <style>
        /* Add your CSS styles for the navigation bar here */
        .navbar {
            background-color: rgb(50,229,200);
            color: white;
            display: flex;
            justify-content: space-between;
            padding: 10px;
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
            background-color: rgb(50,229,200);
        }

        /* Adjust content area to prevent overlapping with sidebar */
        .content {
            margin-left: 260px; /* Adjust the left margin to accommodate the sidebar width */
            padding: 20px;
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
        <a href="#">Dashboard</a>
        <a href="#">Analytics</a>
        <a href="#">Payment Methods</a>
        <a href="#">Create Accounts</a>
        <a href="#">View Accounts</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Add the rest of your website content here -->
        
    </div>

</body>
</html>