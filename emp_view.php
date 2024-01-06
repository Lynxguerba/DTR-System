<?php 
include 'session.php';
require_once 'sidebar.php';
require_once 'background.php';
include('controller/view-employee.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTR SYSTEM</title>

    <!-- CUSTOME CSS -->
    <link rel="stylesheet" href="assets/css/emp-update.css">
    <link rel="stylesheet" href="assets/css/emp-view.css">
    

</head>
<body>

    <div class="container" style=" width:75%; transform: translateX(100px);">
        
    <!-- EMPLOYEE LIST -->
        <div class="employee-list mt-5">
            <!-- HEADER -->
            <div class="header p-3 bg-dark d-grid align-items-center">
                <p class="fs-3 fw-bold text-light">Employee <?php echo $emp_fname . " ". $emp_lname ?></p>
            </div>

            <!-- MAIN -->
            <!-- BACK BUTTON TO EMPLOYEE.PHP -->
            <span class="backButton" id="backButton">
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

            <div class="conatiner  justify-content-center d-flex info-emps">
               
                <div class="profile-picture">
                    <?php
                            echo  '<img src="images/'. $emp_image.'" alt="photo" id="profile-pic">'
                    ?>
                </div>
                <span style="width: 100px;"></span>
                
                <table>
                    <thead>
                        <tr>
                        <th class="fs-3 headtb text-center">DATA</th>
                        <!-- <th class="headtb"></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>ID Number</th>
                            <th id="fw">:&nbsp;&nbsp;<?php echo $emp_id?></th>
                        </tr>
                        <tr>
                            <th>Fullname</th>
                            <th id="fw">:&nbsp;&nbsp;<?php echo $emp_fname . ' ' . $emp_initial . ' ' .  $emp_lname?></th>
                        </tr>
                        <tr>
                            <th >Role</th>
                            <th id="fw">:&nbsp;
                                <?php  // CHANGE THE ROLE_ID TO ROLE_NAME
                                $roleSql = "SELECT role_name FROM role WHERE role_id = $emp_role";
                                $roleResult = mysqli_query($conn, $roleSql);
                                
                                if ($roleResult && $roleRow = mysqli_fetch_assoc($roleResult)) {
                                    echo $roleRow['role_name'];
                                } else {
                                    echo 'Unknown Role';
                                } 
                                    ?>
                            </th>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <th id="fw">:&nbsp;&nbsp;<?php echo $emp_conumber?></th>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <th id="fw">:&nbsp;&nbsp;<?php echo $emp_address?></th>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <th id="fw">:&nbsp;&nbsp;<?php echo $emp_email?></th>
                        </tr>
                        <tr>
                            <th>Date Join</th>
                            <th id="fw">:&nbsp;&nbsp;<?php echo $emp_date_join?></th>
                        </tr>
                    </tbody>
                </table>

            </div>

           
                        
        </div>
    </div>

    <script>
        // BACK BUTTON-------------------------------------------------------
        document.getElementById('backButton').addEventListener('click', function() {
        // Redirect to employee.php when the button is clicked
        window.location.href = 'employee.php';
    });
   
</script>
</body>
</html>