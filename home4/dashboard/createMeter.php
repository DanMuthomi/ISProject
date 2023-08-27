
<?php
include "connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['action']) && $_POST['action'] === 'insert') {
    $username = $_POST['username']; // Properly set the $username variable
    $meterid = $_POST['meterid'];

    // Fetch the user ID based on the selected username
    $sql = "SELECT uid FROM users WHERE uName = '$username'";
    $result = mysqli_query($connect, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        // Existing code...
        $row = mysqli_fetch_assoc($result);
        $uid = $row['uid']; // Get the user ID (uid) from the fetched row

        // Insert the data into the smartmeter table with the fetched uid as a foreign key
        $sql = "INSERT INTO smeter(uid,mid) VALUES('$uid','$meterid')";
        $insert_result = mysqli_query($connect, $sql);
        if ($insert_result) {
            // Redirect to the view accounts page after successful insertion
            header("Location: t_viewAccounts.php");
            exit();
        } else {
            echo "Failed to create meter entry.";
        }
    } else {
        // Existing code...
        header("Location: createMeter.php?username=" . urlencode($username));
        exit();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - Create Meter</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="meter.css">
</head>
<body>
    <!-- ... (existing code for the header and sidebar) ... -->
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
        <!-- Create Meter Form -->
        <div class="form-container">
            <h2>Create Meter</h2>
            <form action="createMeter.php" method="post">
    <!-- Existing form fields ... -->
    <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" onkeyup="suggestUsernames()" required>
                    <div id="username-suggestions"></div>
                </div>
                <div class="form-group">
                    <label for="userid">User ID</label>
                    <input type="text" name="userid" id="userid" readonly>
                </div>
                <div class="form-group">
                    <label for="meterid">Meter ID</label>
                    <input type="text" name="meterid" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Create Meter">
                </div>
</form>

            
        </div>
    </div>

    <!-- JavaScript to handle the auto-suggest feature -->
    <script>
        function suggestUsernames() {
            const input = document.getElementById('username');
            const suggestionsDiv = document.getElementById('username-suggestions');
            const username = input.value;

            if (username.length > 0) {
                // Use AJAX to get username suggestions from the server
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        const suggestions = JSON.parse(this.responseText);
                        suggestionsDiv.innerHTML = '';
                        suggestions.forEach(suggestion => {
                            const option = document.createElement('div');
                            option.innerHTML = suggestion;
                            option.onclick = function () {
                                input.value = suggestion;
                                suggestionsDiv.innerHTML = '';
                                // Fetch the user ID based on the selected username
                                fetchUserID(suggestion);
                            };
                            suggestionsDiv.appendChild(option);
                        });
                    }
                };
                xhttp.open('GET', 'get_usernames.php?username=' + encodeURIComponent(username), true);
                xhttp.send();
            } else {
                suggestionsDiv.innerHTML = '';
            }
        }

        function fetchUserID(username) {
            const useridInput = document.getElementById('userid');

            // Use AJAX to fetch the user ID from the server based on the selected username
            const xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    useridInput.value = this.responseText;
                }
            };
            xhttp.open('GET', 'get_userid.php?username=' + encodeURIComponent(username), true);
            xhttp.send();
        }
    </script>
</body>
</html>