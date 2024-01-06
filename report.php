<?php 
include 'session.php';
require_once 'sidebar.php';
require_once 'background.php';
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
    <link rel="stylesheet" href="assets/css/shift1.css">
    
</head>
<body style="background: #e0e0e0;">
<div class="container p-5" style=" width:80%; transform: translateX(100px);"> 
        <div class="shift-status">

            <!-- HEADER -->
            <div class="header bg-dark">
                <h3 class="text-light fw-bold">Records</h3>
            </div>

            <!-- MAIN -->
            <div class="main p-3">
            <form action="" method="post">
                <div class="search-date d-flex justify-content-between align-items-center">
            

                    <!-- SEARCH -->
                    <div class="form-floating mb-3" style="width: 50vh;">
                        <input type="text" name="emp-search" class="form-control" id="emp-search"  placeholder="name@example.com" >
                        <label for="floatingInput">
                        <img src="images/search.png" alt="" height="15" width="15">    
                        Search</label>  
                    </div>
                    
                    <a href="generate-record.php" class="btn btn-danger" name="generate-report">Generate Record</a>
                   
                </div>
                <div class="table-employee container" style="padding: 0; overflow-y: auto; height: 390px;">
                
                    <table class="table table-striped">
                        <thead class="table-dark" style="position: sticky; top: 0;">
                            <tr>
                                <th>Date</th>
                                <th>ID Number</th>
                                <th>Fullname</th>
                                <th>Role</th>
                                <th>Shift Start Time</th>
                                <th>Shift End Time</th>
                                <th>TOTAL HOUR</th>             
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                include('database/config.php');

                                $sql = "SELECT * FROM `shift_data`";
                                $result = mysqli_query($conn, $sql);

                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $shift_date = $row['shift_date'];
                                        $emp_id = $row['emp_id'];
                                        $emp_fname= $row['emp_fname'];
                                        $emp_lname= $row['emp_lname'];
                                        $emp_role = $row['emp_role'];  
                                        $shift_start = $row['shift_start_time'];  
                                        $shift_end = $row['shift_end_time'];  
                                        $total_hour= $row['total_hours'];  
                                       
                                        
                                        echo '  <tr>';
                                        echo'      <td>' . $shift_date . '</td>';
                                        echo '   <td scope="row">' . $emp_id . '</td>';
                                        echo'      <td>' . $emp_fname . ' ' . $emp_lname .'</td>';
                                        echo'      <td>';
                                            $roleSql = "SELECT role_name FROM role WHERE role_id = $emp_role";
                                            $roleResult = mysqli_query($conn, $roleSql);
                                            
                                            if ($roleResult && $roleRow = mysqli_fetch_assoc($roleResult)) {
                                                echo $roleRow['role_name'];
                                            } else {
                                                echo 'Unknown Role';
                                            } 
                                        '</td>';
                                        echo '     <td>' . $shift_start . '</td>';
                                        echo '     <td>' . $shift_end . '</td>';
                                        echo '     <td>' . $total_hour . '</td>
                                        </tr>';
                                    }
                                }
                        
                            ?>
                        </tbody>
                    </table>
                        
                       
                       
                </div>
                
                </form>
            </div>
           
            
        </div>
    </div>
    
    <script src="assets/js/shift-search.js"></script>
    <style>
        #no-record-row {
        height: 100px;
        text-align: center; 
        font-size: 3em; 
    }
    </style>

</body>
</body>
</html>