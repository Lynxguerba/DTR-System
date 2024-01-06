<?php 
include 'session.php';
require_once 'sidebar.php';
require_once 'background.php';
include('database/config.php');
include('controller/add-employe.php');

if (isset($_POST['reset'])) {
   
    $truncate = "TRUNCATE TABLE onduty";
    $result = mysqli_query($conn, $truncate);

    $truncate = "TRUNCATE TABLE shift_in";
    $result = mysqli_query($conn, $truncate);

    $truncate = "TRUNCATE TABLE shift_out";
    $result = mysqli_query($conn, $truncate);

}

if (isset($_POST['sent-to-database'])) {
    // Iterate through the employees and insert data into the shift_data table
    $sql = "SELECT * FROM `employee`";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $emp_id = $row['emp_id'];
            $emp_fname = $row['emp_fname'];
            $emp_lname = $row['emp_lname'];
            $emp_role = $row['emp_role'];

            // Fetch Time In
            $timeInSql = "SELECT shift_time FROM shift_in WHERE emp_id = ?";
            $timeInStmt = mysqli_prepare($conn, $timeInSql);
            mysqli_stmt_bind_param($timeInStmt, "i", $emp_id);
            mysqli_stmt_execute($timeInStmt);
            $timeInResult = mysqli_stmt_get_result($timeInStmt);
            $timeInRow = mysqli_fetch_assoc($timeInResult);
            echo '<td>';

            // Fetch Time Out
            $timeOutSql = "SELECT shift_time FROM shift_out WHERE emp_id = ?";
            $timeOutStmt = mysqli_prepare($conn, $timeOutSql);
            mysqli_stmt_bind_param($timeOutStmt, "i", $emp_id);
            mysqli_stmt_execute($timeOutStmt);
            $timeOutResult = mysqli_stmt_get_result($timeOutStmt);
            $timeOutRow = mysqli_fetch_assoc($timeOutResult);

            // Fetch Onduty Status
            $ondutyQuery = "SELECT * FROM onduty WHERE emp_id = $emp_id";
            $ondutyResult = mysqli_query($conn, $ondutyQuery);
            $ondutyStatus = (mysqli_num_rows($ondutyResult) > 0) ? 'ON DUTY' : 'OFF DUTY';

            // Calculate total hours
            $totalHours = ($timeInRow && $timeOutRow) ? calculateTimeDifference($timeInRow['shift_time'], $timeOutRow['shift_time']) : null;

            // Insert data into the shift_data table
            $insertQuery = "INSERT INTO shift_data (emp_id, emp_fname, emp_lname, emp_role, shift_start_time, shift_end_time, status, total_hours) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($insertStmt, "isssssss", $emp_id, $emp_fname, $emp_lname, $emp_role, $timeInRow['shift_time'], $timeOutRow['shift_time'], $ondutyStatus, $totalHours);
            mysqli_stmt_execute($insertStmt);
        }
    }
}
?>

<head>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/css/shift1.css">
    
</head>

<body>
    <div class="container p-5" style=" width:80%; transform: translateX(100px);"> 
        <div class="shift-status">

            <!-- HEADER -->
            <div class="header bg-dark">
                <h3 class="text-light fw-bold">Shifts</h3>
            </div>

            <!-- MAIN -->
            <div class="main p-3">
                <div class="search-date d-flex justify-content-between align-items-center">
                    <!-- DATE -->
                    <div class="text-date d-flex align-items-center" >
                        <h5 style="transform: translateY(-4px);"> Today's Date:&nbsp;</h5>
                        <p class="fw-bold fs-5">
                        <?php
                            date_default_timezone_set('Asia/Manila');
                            $currentDate = date("l , F j, Y");
                            echo $currentDate;
                        ?>
                        </p>
                    </div>

                    <!-- SEARCH -->
                    <!-- <div class="form-floating mb-3" style="width: 50vh;">
                        <input type="text" name="emp-seacrh" required class="form-control" id="emp-search"  placeholder="name@example.com" >
                        <label for="floatingInput">
                        <img src="images/search.png" alt="" height="15" width="15">    
                        Search</label>  
                    </div> -->
                   
                </div>
                <div class="table-employee container" style="padding: 0; overflow-y: auto; height: 390px;">
                <form action="" method="post">
                    <table class="table table-striped">
                        <thead class="table-dark" style="position: sticky; top: 0;">
                            <tr>
                                <th>ID Number</th>
                                <th>Fullname</th>
                                <th>Role</th>
                                <th>Shift Start Time</th>
                                <th>Shift End Time</th>
                                <th>Status</th>
                                <th>TOTAL HOUR</th>
                               
                               
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                            include('database/config.php');


                                $sql = "SELECT * FROM `employee`";
                                $result = mysqli_query($conn, $sql);

                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $emp_id = $row['emp_id'];
                                        $emp_fname= $row['emp_fname'];
                                        $emp_lname= $row['emp_lname'];
                                        $emp_role = $row['emp_role'];  
                                        
                                        echo '  <tr  id="emp-row-' . $emp_id . '">';
                                        echo '   <th scope="row">' . $emp_id . '</th>';
                                        echo'  <td>' . $emp_fname . ' '. $emp_lname .'</td>  
                                        <td>';
                            
                                                // CHANGE THE ROLE_ID TO ROLE_NAME
                                                $roleSql = "SELECT role_name FROM role WHERE role_id = $emp_role";
                                                $roleResult = mysqli_query($conn, $roleSql);
                                                
                                                if ($roleResult && $roleRow = mysqli_fetch_assoc($roleResult)) {
                                                    echo $roleRow['role_name'];
                                                } else {
                                                    echo 'Unknown Role';
                                                } 
                                      
                                        $emp_id = $row['emp_id'];

                                        // TIME IN ============================================================
                                        $timeInSql = "SELECT shift_time FROM shift_in WHERE emp_id = ?";
                                        $timeInStmt = mysqli_prepare($conn, $timeInSql);
                                        mysqli_stmt_bind_param($timeInStmt, "i", $emp_id);
                                        mysqli_stmt_execute($timeInStmt);
                                        $timeInResult = mysqli_stmt_get_result($timeInStmt);
                                    
                                        echo '<td>';
                                        if ($timeInRow = mysqli_fetch_assoc($timeInResult)) {
                                            // CONVERT IN to AM/PM FORMAT
                                            $timeInAMPM = date("g:i A", strtotime($timeInRow['shift_time']));
                                            echo $timeInAMPM;
                                        } else {
                                            echo '<p class="text-danger">No Time In</p>';
                                        }
                                        echo '</td>';

                                        // TIME OUT =============================================================
                                        $timeOutSql = "SELECT shift_time FROM shift_out WHERE emp_id = ?";
                                        $timeOutStmt = mysqli_prepare($conn, $timeOutSql);
                                        mysqli_stmt_bind_param($timeOutStmt, "i", $emp_id);
                                        mysqli_stmt_execute($timeOutStmt);
                                        $timeOutResult = mysqli_stmt_get_result($timeOutStmt);

                                        echo '<td>';
                                        if ($timeOutRow = mysqli_fetch_assoc($timeOutResult)) {
                                            // CONVERT OUT to AM/PM FORMAT
                                            $timeOutAMPM = date("g:i A", strtotime($timeOutRow['shift_time']));
                                            echo  $timeOutAMPM;
                                        } else {
                                            echo '<p class="text-danger">No Time Out</p>';
                                        }
                                        
                                        // ONDUTY STATUS ================================================================
                                        echo '</td>';
                                    
                                       echo ' <td>';
                                       $ondutyQuery = "SELECT * FROM onduty WHERE emp_id = $emp_id";
                                       $ondutyResult = mysqli_query($conn, $ondutyQuery);

                                       if ($ondutyResult) {
                                           // Check if there are rows in the result set
                                           if (mysqli_num_rows($ondutyResult) > 0) {
                                               echo "ON DUTY";
                                           } else {
                                               echo "<p style='color: red;'>OFF DUTY</p>";
                                           }
                                       } else {
                                           echo "Error executing query: " . mysqli_error($conn);
                                       }
                                   
                                        echo '</td>';
                                        
                                        if ($timeInRow && $timeOutRow) {
                                            $totalHours = calculateTimeDifference($timeInRow['shift_time'], $timeOutRow['shift_time']);
                                            echo '<td>' . $totalHours . '</td>';
                                        } else {
                                            echo '<td>00:00:00</td>';
                                        }
                                        echo '</tr>';

                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                        
                        <button class="btn btn-danger" name="reset" onclick="return confirm('RESET ALL?')">RESET ALL</button>
                        <button class="btn btn-secondary" name="sent-to-database" onclick="return alert('RECORD SAVED!')">SAVE RECORD</button>
                        </form>
                </div>
            </div>
           
            
        </div>
    </div>

</body>
<?php
function calculateTimeDifference($startTime, $endTime) {
    $startDateTime = new DateTime($startTime);
    $endDateTime = new DateTime($endTime);
    $interval = $startDateTime->diff($endDateTime);

    return $interval->format('%H:%I:%S');
}

?>