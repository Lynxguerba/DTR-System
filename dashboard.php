<?php 
//include 'session.php';
require_once 'sidebar.php';
require_once 'background.php';
include('assets/php/count.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTR SYSTEM</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/css/dashboard.css">

</head>
<body style='background: #fofofo;'>
    
    <div class="container" style="width:75%;transform: translateX(80px)">
        
        <!-- DASHBOARD HEADER -->
        <div class="dashboard-header p-3 d-flex text-light">

        <div class="col-6 dash-title">
            <p class="fs-4 fw-semibold">Welcome, Admin!</p>
            <p class="fs-1 fw-bold">DAILY TIME RECORD</p>
            <p class="fw-bold fs-5">
                <?php
                    date_default_timezone_set('Asia/Manila'); 
                    $currentDate = date("l, F j, Y");
                    echo $currentDate;
                ?>
            </p>
        </div>

            <div class="col-6 d-flex align-items-center justify-content-center">
                <div class="time fw-bold" id="time">00:00:00</div>
                <img src="images/dtr_employee.png" alt="time">
            </div>
        </div>

        <!-- DASHBOARD COUNTS -->
        <div class="card-status d-flex pt-5 justify-content-between">
           <div class="card row d-flex">
                <div class="col-8">
                    <p class="fs-3 dash-counts" >
                        <?php echo $count_employee?>
                    </p>
                    <p class="fs-4 fw-semibold">EMPLOYEES</p>
                </div>
                <div class="col-5" style="transform: translateX(-20px);">
                    <img src="images/emps.png" alt="staff">
                </div>
           </div>

           <div class="card row d-flex" >
                <div class="col-7">
                    <p class="fs-3 dash-counts">
                         <?php echo $count_timeIn?>
                    </p>
                    <p class="fs-4 fw-semibold">TIME IN</p>
                </div>
                <div class="col-5" >
                    <img src="images/back-in-time.png" alt="staff">
                </div>
           </div>
           <div class="card row d-flex">
                <div class="col-7">
                    <p class="fs-3 dash-counts">
                      <?php echo $count_timeOut?>
                    </p>
                    <p class="fs-4 fw-semibold">TIME OUT</p>
                </div>
                <div class="col-5" >
                    <img src="images/time_out.png" alt="staff">
                </div>
           </div>
        </div>
        

    </div>
    <script src="assets/js/clock.js"></script>
</body>
</html>