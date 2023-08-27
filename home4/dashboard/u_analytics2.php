<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - Analytics</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="analytics.css">
    <!-- Add the Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="navbar">
        <!-- Company Logo -->
        <div class="logo">
            <a class="navbar-brand" href="u_dashboard.php">
      <img src="images\logo.jpg" alt="Logo" width="30" height="24">
    </a>
        </div>

        <!-- User Profile and Dropdown Menu -->
        <div class="user-menu">
            <img class="user-img" src="path/to/user-image.jpg" alt="User Image">
            <div class="dropdown-content">
                <a href="u_my_profile.php">My Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="u_dashboard.php">Dashboard</a>
        <a href="u_analytics2.php?username=<?php echo urlencode($username); ?>">Analytics</a>
        <a href="u_paymentMethod.php">Payment Methods</a>
    </div>

    <div class="content">
        <!-- Analytics page -->
        <div class="analytics-container">
            <h2>Energy Usage Analytics</h2>
            <div class="download-csv">
                <a href="download_data.php" class="btn btn-primary">Download CSV</a>
            </div>

            <!-- Line Graph -->
            <div class="graph-container">
                <canvas id="lineChart"></canvas>
            </div>

            <!-- Bar Graph -->
            <div class="graph-container">
                <canvas id="barChart"></canvas>
            </div>

            <!-- Table to display meter data -->
            <div class="table-container">
                <?php
                    // Include database connection and other necessary files
                    include "connect.php";

                    // Start the session and retrieve the username from the URL parameter
                    session_start();
                    if (isset($_GET['username'])) {
                        $username = $_GET['username'];

                        // Fetch the uid of the specific user based on the provided username
                        $sql = "SELECT uid FROM users WHERE uName = ?";
                        $stmt = $connect->prepare($sql);
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows == 1) {
                            $user = $result->fetch_assoc();
                            $uid = $user['uid'];

                            // Now you have the uid, use it to fetch data from the meters database for that user
                            $sql = "SELECT * FROM meters WHERE uid = ?";
                            $stmt = $connect->prepare($sql);
                            $stmt->bind_param("i", $uid);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Now you can use $result to display the data in a table
                            echo "<h3>Energy Usage Data for User: $username</h3>";
                            echo "<table border='1'>
                                    <tr>
                                        <th>Time</th>
                                        <th>Longitude</th>
                                        <th>Latitude</th>
                                        <th>Energy (Watts)</th>
                                    </tr>";

                            $timeData = array();
                            $energyData = array();

                            while ($row = mysqli_fetch_assoc($result)) {
                                $time = date('d-m-Y H:i:s', strtotime($row['time']));
                                $longitude = $row['longitude'];
                                $latitude = $row['latitude'];
                                $energy = $row['energy'];

                                echo "<tr>
                                        <td>$time</td>
                                        <td>$longitude</td>
                                        <td>$latitude</td>
                                        <td>$energy</td>
                                      </tr>";

                                // Store data in arrays for graph plotting
                                $timeData[] = $time;
                                $energyData[] = $energy;
                            }

                            echo "</table>";
                        } else {
                            echo "User not found.";
                        }
                    } else {
                        echo "Username parameter not provided.";
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- JavaScript to create line graph and bar graph -->
    <script>
        // Use PHP data to populate the line and bar graphs
        var timeData = <?php echo json_encode($timeData); ?>;
        var energyData = <?php echo json_encode($energyData); ?>;

        // Create Line Graph
        var lineChartCanvas = document.getElementById('lineChart');
        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: {
                labels: timeData,
                datasets: [{
                    label: 'Energy Usage (Watts)',
                    data: energyData,
                    borderColor: 'rgb(50, 229, 200)',
                    backgroundColor: 'rgba(50, 229, 200, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Time'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Energy (watts)'
                        }
                    }
                }
            }
        });

        // Create Bar Graph
        var barChartCanvas = document.getElementById('barChart');
        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: {
                labels: timeData,
                datasets: [{
                    label: 'Energy Usage (Watts)',
                    data: energyData,
                    backgroundColor: 'rgb(50, 229, 200)',
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Time'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Energy (Watts)'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>


