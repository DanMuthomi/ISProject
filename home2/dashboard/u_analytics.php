
<!DOCTYPE html>
<html>
<head>
    <title>Energy Monitoring System - Analytics</title>
    <!-- Add your CSS styles here or link an external CSS file -->
    <link rel="stylesheet" type="text/css" href="analytics.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
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
                <a href="#">My Profile</a>
                <a href="#">Settings</a>
                <a href="login.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="u_dashboard.php">Dashboard</a>
        <a href="u_analytics.php">Analytics</a>
        <a href="u_paymentMethod.php">Payment Methods</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <!-- Analytics page -->
        <div class="analytics-container">
            <h2>Energy Usage Analytics</h2>

            <!-- Line Graph -->
            <div class="graph-container">
                <canvas id="lineChart"></canvas>
            </div>

            <!-- Bar Graph -->
            <div class="graph-container">
                <canvas id="barChart"></canvas>
            </div>

            <!-- Map Feature -->
            <div class="map-container" id="map"></div>
        </div>

        <!-- JavaScript libraries for charts and map -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

        <!-- JavaScript to create line graph and bar graph -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Sample data (replace with actual data from your backend)
                var energyData = [1200, 1400, 1300, 1600, 1800, 2000];
                var timeData = ["Jan", "Feb", "Mar", "Apr", "May", "Jun"];

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

                // Create Map Feature (Leaflet map)
                var map = L.map('map').setView([0.0236, 37.9062], 6); // Centered on Kenya with a zoom level of 6
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
            });
        </script>
    </div>
        
    </div>

</body>
</html>