<?php

require_once 'background.php';
include('database/config.php');
//include('index-login.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTR System</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/css/backbutton.css">
    <link rel="stylesheet" href="assets/css/index1.css">
   
</head>
<body>
    <div class="container d-grid mt-5 justify-content-center">

        <div class="main d-grid align-items-start">

            <div class="clock d-flex mt-5 justify-content-start p-3">
                <div class="date-time">
                    <div class="time fw-bold text-light" id="time">00:00:00</div>
                    <div class="date">
                        <p class="text-light fw-bold fs-5">
                            <?php
                                $currentDate = date("F j, Y");
                                echo $currentDate;
                            ?>
                        </p>
                    </div>
                </div>
                <div style="width: 180px;"></div>

                <div class="conts">

                    <!-- BUTTON TO SHOW MODAL OR LOG IN  BUTTON -->
                    <span class="show-modal backButton">
                        <div class="button-box">
                            <span class="button-elem">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 40">
                                    <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                                </svg>
                            </span>
                            <span class="button-elem">
                                <svg viewBox="0 0 46 40">
                                    <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                                </svg>
                            </span>
                        </div>  
                    </span>
                    <p class="fs-4 text-light">Admin Log In</p>
                
                    
                    <!-- LOG IN FORM MODAL -->
                    <span class="overlay"></span>

                    <div class="modal-box p-5">
                        
                        <button class="close-btn" style="transform: translate(50px, -30px);">
                            <img src="images/close.png" alt="closeBtn" style="width: 34px; height: 34px;">
                        </button>
                        <div class="login-form-admin">
                            <div class="header-divs d-flex">
                                <img src="images/user_icon.png" alt="" style="height: 50px; transform: translateY(-5px);">
                                <span style="width: 10px;"></span>
                                <h2 class="fw-bold">Admin Log In</h2>
                            </div> <br>
                            <form action="index.php" method="post">
                                <div class="form-floating mb-3" style="width: 100%;">
                                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Username</label>  
                                </div>
                                <div class="form-floating mb-3" style="width: 100%;">
                                    <input type="password" name="password" class="form-control" id="floatingInput" placeholder="name@example.com" >
                                    <label for="floatingInput">Password</label>  
                                </div>
                                <button class="btn btn-secondary" name="submit">
                                    <img src="images/login.png" alt="" style="width: 20px; height: 20px; transform: rotate(180deg);">
                                    <span style="width: 5px;"></span>
                                    Log In
                                </button>
                            </form>
                        </div>  
                    </div>
                </div>
            </div>

            <!-- TIME IN / TIME OUT FORM -->
            <div class="form p-5 d-flex">
               
                <form action="index.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="number" name="emp_id" class="form-control text-center" required id="floatingInput" placeholder="Enter ID" style="width: 85vh;" oninvalid="this.setCustomValidity('Please enter the Employee ID');" oninput="this.setCustomValidity('');">
                        <label for="floatingInput">Enter ID</label>
                    </div>
                    <div class="buttons d-flex">
                        <button class="btn btn-primary" style="width: 50%;" name="time_in">Time In</button>
                        <div style="width: 10%;"></div>
                        <button class="btn btn-primary" style="width: 50%;" name="time_out">Time Out</button>
                    </div>
                </form>
            </div>
        </div>
<style>
    *{
        /* outline: 1px solid red; */
    }
    
</style>
            <?php
                include('database/config.php');
                if (isset($_POST['emp_id'])) {
                    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);

                    // QUERY TO FETCH EMPLOYEE DETAILS ===============================================================================
                    $employeeDetailsSql = "SELECT emp_fname, emp_lname FROM employee WHERE emp_id = $emp_id";
                    $employeeDetailsResult = mysqli_query($conn, $employeeDetailsSql);

                    if ($employeeDetailsResult) {
                        $employeeDetails = mysqli_fetch_assoc($employeeDetailsResult);

                        if ($employeeDetails) {
                            echo "<div class='info-emps-primary'>";
                            echo "<p class='fs-4 mt-4'>Employee {$employeeDetails['emp_fname']} {$employeeDetails['emp_lname']}</p>";
                            echo "</div>";
                        } else {
                            echo "<div class='info-emps-warning'>";
                            echo "<p class='fs-4 mt-4'>Employee not found.</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "Error fetching employee details: " . mysqli_error($conn);

                    }
                }


                // TIME IN ==========================================================================================================
                if (isset($_POST['time_in'])) {
                    

                    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);

                    // Check if the employee ID exists in the employee table
                    $checkEmployeeSql = "SELECT * FROM employee WHERE emp_id = $emp_id";
                    $checkEmployeeResult = mysqli_query($conn, $checkEmployeeSql);

                    if (mysqli_num_rows($checkEmployeeResult) > 0) {
                        // Check if there is an existing Time In record for the employee
                        $checkTimeInSql = "SELECT * FROM time_in WHERE emp_id = $emp_id";
                        $checkTimeInResult = mysqli_query($conn, $checkTimeInSql);

                        if (mysqli_num_rows($checkTimeInResult) > 0) {
                            echo "<div class='info-emps-primary-time'>";
                            echo "Is already clocked in.";
                            echo "</div>";
                        } else {
                            // If the employee exists and there is no existing Time In record, proceed
                            // Delete the Time Out record if it exists
                            $deleteTimeOutSql = "DELETE FROM time_out WHERE emp_id = $emp_id";
                            $deleteTimeOutResult = mysqli_query($conn, $deleteTimeOutSql);

                            // Insert a new Time In record
                            $insertTimeInSql = "INSERT INTO time_in (emp_id) VALUES ($emp_id)";
                            $insertTimeInResult = mysqli_query($conn, $insertTimeInSql);

                            if ($deleteTimeOutResult && $insertTimeInResult) {
                                echo "<div class='info-emps-primary-time'>";
                                echo "Is now Timed In!";
                                echo "</div>";  
                            } else {
                                echo "Error recording Time In: " . mysqli_error($conn);
                            }
                        }
                    } else {
                        echo "<div class='not-emps-warning'>";
                        echo "<p class='fs-4 mt-4'>Employee ID is not registered.</p>";
                        echo "</div>";
                    }
                }
    

                // SHIFT TIME IN==========================================================================================================
                if (isset($_POST['time_in'])) {
                    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
                    // Check if the employee ID exists in the employee table
                    $checkEmployeeSql = "SELECT * FROM employee WHERE emp_id = $emp_id";
                    $checkEmployeeResult = mysqli_query($conn, $checkEmployeeSql);

                    if (mysqli_num_rows($checkEmployeeResult) > 0) {
                        // Check if there is an existing Time In record for the employee
                        $checkTimeInSql = "SELECT * FROM shift_in WHERE emp_id = $emp_id";
                        $checkTimeInResult = mysqli_query($conn, $checkTimeInSql);

                        if (mysqli_num_rows($checkTimeInResult) > 0) {
                           
                        } else {
            
                            $insertTimeInSql = "INSERT INTO shift_in (emp_id) VALUES ($emp_id)";
                            $insertTimeInResult = mysqli_query($conn, $insertTimeInSql); 
                        }
                    } 
                }
    

                // TIME OUT ============================================================================================================
                if (isset($_POST['time_out'])) {
                    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);

                    // Check if the employee ID exists in the employee table
                    $checkEmployeeSql = "SELECT * FROM employee WHERE emp_id = $emp_id";
                    $checkEmployeeResult = mysqli_query($conn, $checkEmployeeSql);

                    if (mysqli_num_rows($checkEmployeeResult) > 0) {
                        // Check if there is an existing Time Out record for the employee
                        $checkTimeOutSql = "SELECT * FROM time_out WHERE emp_id = $emp_id";
                        $checkTimeOutResult = mysqli_query($conn, $checkTimeOutSql);

                        if (mysqli_num_rows($checkTimeOutResult) > 0) {
                            echo "<div class='info-emps-primary-time'>";
                            echo "Is already clocked out";
                            echo "</div>";
                        } else {
                            // If the employee exists and there is no existing Time Out record, proceed
                            // Delete the Time In record if it exists
                            $deleteTimeInSql = "DELETE FROM time_in WHERE emp_id = $emp_id";
                            $deleteTimeInResult = mysqli_query($conn, $deleteTimeInSql);

                            // Insert a new Time Out record
                            $insertTimeOutSql = "INSERT INTO time_out (emp_id) VALUES ($emp_id)";
                            $insertTimeOutResult = mysqli_query($conn, $insertTimeOutSql);

                            if ($deleteTimeInResult && $insertTimeOutResult) {
                                echo "<div class='info-emps-primary-time'>";
                                echo "Is now Timed Out!";
                                echo "</div>";  
                            } else {
                                echo "Error recording Time Out: " . mysqli_error($conn);
                            }
                        }
                    } else {
                        echo "<div class='not-emps-warning'>";
                        echo "<p class='fs-4 mt-4'>Employee ID is not registered.</p>";
                        echo "</div>";
                    }
                }
                // SHIFT TIME OUT==========================================================================================================
                if (isset($_POST['time_out'])) {
                    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
                    // Check if the employee ID exists in the employee table
                    $checkEmployeeSql = "SELECT * FROM employee WHERE emp_id = $emp_id";
                    $checkEmployeeResult = mysqli_query($conn, $checkEmployeeSql);

                    if (mysqli_num_rows($checkEmployeeResult) > 0) {
                        // Check if there is an existing Time In record for the employee
                        $checkTimeInSql = "SELECT * FROM shift_out WHERE emp_id = $emp_id";
                        $checkTimeInResult = mysqli_query($conn, $checkTimeInSql);

                        if (mysqli_num_rows($checkTimeInResult) > 0) {
                           
                        } else {
            
                            $insertTimeInSql = "INSERT INTO shift_out (emp_id) VALUES ($emp_id)";
                            $insertTimeInResult = mysqli_query($conn, $insertTimeInSql); 
                        }
                    } 
                }
                // ON DUTY ===============================================================================================================
                if (isset($_POST['time_in'])) {
                    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
                    // Check if the employee ID exists in the employee table
                    $checkEmployeeSql = "SELECT * FROM employee WHERE emp_id = $emp_id";
                    $checkEmployeeResult = mysqli_query($conn, $checkEmployeeSql);

                    if (mysqli_num_rows($checkEmployeeResult) > 0) {
                        // Check if there is an existing Time In record for the employee
                        $checkTimeInSql = "SELECT * FROM onduty WHERE emp_id = $emp_id";
                        $checkTimeInResult = mysqli_query($conn, $checkTimeInSql);

                        if (mysqli_num_rows($checkTimeInResult) > 0) {
                           
                        } else {
            
                            $insertTimeInSql = "INSERT INTO onduty (emp_id) VALUES ($emp_id)";
                            $insertTimeInResult = mysqli_query($conn, $insertTimeInSql); 
                        }
                    } 
                }
                // OFF DUTY ===============================================================================================================
                if (isset($_POST['time_out'])) {
                    $emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
                    // Check if the employee ID exists in the employee table
                    $checkEmployeeSql = "SELECT * FROM employee WHERE emp_id = $emp_id";
                    $checkEmployeeResult = mysqli_query($conn, $checkEmployeeSql);

                    if (mysqli_num_rows($checkEmployeeResult) > 0) {
                        // Check if there is an existing Time In record for the employee
                        $checkTimeInSql = "SELECT * FROM offduty WHERE emp_id = $emp_id";
                        $checkTimeInResult = mysqli_query($conn, $checkTimeInSql);

                        if (mysqli_num_rows($checkTimeInResult) > 0) {
                           
                        } else {
            
                            $insertTimeInSql = "INSERT INTO offduty (emp_id) VALUES ($emp_id)";
                            $insertTimeInResult = mysqli_query($conn, $insertTimeInSql); 
                        }
                    } 
                }
            ?>



    </div>
    
    <script src="assets/js/clock.js"></script>
    <script src="assets/js/modal.js"></script>
    
</body>
</html>