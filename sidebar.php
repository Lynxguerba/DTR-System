<?php 
// include 'session.php';   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATE TIME RECORD SYSTEM</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/sidebar1.css">
    <link rel="stylesheet" href="assets/css/toggle-sidebar.css">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <!-- sidebabr -->
    <div class="bar" >
        <div class="sidebar">
            <div class="logo"></div>
            <ul class="menu">
            <li class="active">
                <a href="dashboard.php">
                    <img src="images/dashboard.png" alt="icon">
                    <span class="fw-bold">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="shift.php">
                    <img src="images/attendance.png" alt="icon">
                    <span class="fw-bold">Shifts</span>
                </a>
            </li>
            <li>
                <a href="employee.php">
                    <img src="images/employee.png" alt="icon">
                    <span class="fw-bold">Employee</span>
                </a>
            </li>
           
            <li>
                <a href="report.php">
                    <img src="images/report.png" alt="icon">
                    <span class="fw-bold">Records</span>
                </a>
            </li>
            <li>
                <!-- <a href="admin.php">
                <img src="images/admin1.png" alt="icon">
                    <span class="fw-bold">Admin</span>
                </a> -->

                <a href="session_destroy.php" onclick="return confirm('ARE YOU SURE YOU WANT TO LOG OUT?')">
                     
                        <img src="images/sign-out-alt.png" alt="icon">
                        <span class="fw-bold">LOG&nbsp;OUT</span>
                    
                </a>
    
            </li>
            <li>
                <button class="toggle-sidebar-btn menu__icon" onclick="toggleSidebar()">
                    <span></span>
                    <span></span>
                </button>
            </li>
            
            </ul>
            
        </div>
    </div>
  

    <script src="assets/js/toggle-sidebar.js"></script>
</body>
</html>
