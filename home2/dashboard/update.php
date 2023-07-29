<?php
    include "connect.php";
    if (isset($_GET['updateid'])){
        $id = $_GET['updateid'];
        $mysql = "SELECT * FROM users WHERE uid=$id";
        $result = mysqli_query($connect, $mysql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $username = $row['uName'];
            $fullname = $row['fullName'];
            $email = $row['email'];
            $role = $row['role'];
        }
        if ($_SERVER['REQUEST_METHOD']=="POST"){
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $fullname = mysqli_real_escape_string($connect, $_POST['fullname']);
            $email = mysqli_real_escape_string($connect, $_POST['email']);
            $sql = "UPDATE users SET uName='$username', fullName='$fullname', email='$email' WHERE uid=$id";
            $result = mysqli_query($connect, $sql);
            if ($result){
                header("location:a_viewAccounts.php");
            }
            else{
                echo "not updated";
            }
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
        <!-- Update Accounts Form -->
        <?php
            $roles = array("ADMIN","TECHNICIAN");
        ?>
        <div class="form-container">
            <h2>Update Account</h2>
            <form action="update.php?updateid=<?php echo $id; ?>" method="post">
                <!-- Existing form fields ... -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?php echo $username;?>" required>
                </div>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" value="<?php echo $fullname;?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" value="<?php echo $email;?>" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Account">
                </div>
            </form>
        </div>
    </div>


</body>
</html>