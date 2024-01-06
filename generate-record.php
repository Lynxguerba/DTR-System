<?php

// include('database/config.php');
// include 'session.php';
?>
<!-- 
<table border="1">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Id Number</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Role</th>
            <th scope="col">Shift Start</th>
            <th scope="col">Shift End</th>
            <th scope="col">Total Hour</th>
        </tr>
    </thead> -->

    <?php 
    // $filename = "Record list";
    // $dateTaken = date("Y-m-d");
    // $cnt = 1;			
    // $ret = mysqli_query($conn, "SELECT * FROM shift_data");

    // if(mysqli_num_rows($ret) > 0) {
    //     while ($row = mysqli_fetch_array($ret)) { 
    //         echo '<tr>';
    //         echo '<td>'.$cnt.'</td>'; 
    //         echo '<td>'.$shift_date = $row['shift_date'].'</td>'; 
    //         echo '<td>'.$emp_id = $row['emp_id'].'</td>'; 
    //         echo '<td>'.$emp_fname = $row['emp_fname'].'</td>';
    //         echo '<td>'.$emp_lame = $row['emp_lname'].'</td>'; 

    //         // Fetch the employee role
    //         $emp_role = $row['emp_role'];
    //         $roleSql = "SELECT role_name FROM role WHERE role_id = $emp_role";
    //         $roleResult = mysqli_query($conn, $roleSql);

    //         if ($roleResult && $roleRow = mysqli_fetch_assoc($roleResult)) {
    //             echo '<td>'.$roleRow['role_name'].'</td>';
    //         } else {
    //             echo '<td>Unknown Role</td>';
    //         } 

    //         echo '<td>'.$shift_start = $row['shift_start_time'].'</td>'; 
    //         echo '<td>'.$shift_end = $row['shift_end_time'].'</td>';	
    //         echo '<td>'.$total_hours = $row['total_hours'].'</td>';		
    //         echo '</tr>';

    //         $cnt++;
//         }
//     }
//     ?>
// </table>

<!-- Add the download button outside of the loop -->
<?php
// header("Content-type: application/octet-stream");
// header("Content-Disposition: attachment; filename=".$filename."-report.xls");
// header("Pragma: no-cache");
// header("Expires: 0");
?>

<?php
include('database/config.php');
include 'session.php';

// Check if a search query is provided
if(isset($_POST['emp-search']) && !empty($_POST['emp-search'])) {
    $searchQuery = mysqli_real_escape_string($conn, $_POST['emp-search']);
    $sql = "SELECT * FROM `shift_data` WHERE 
            emp_id LIKE '%$searchQuery%' OR 
            emp_fname LIKE '%$searchQuery%' OR 
            emp_lname LIKE '%$searchQuery%'";
} else {
    $sql = "SELECT * FROM `shift_data`";
}

$result = mysqli_query($conn, $sql);
$filename = "Record list";
$dateTaken = date("Y-m-d");
$cnt = 1;
?>

<table border="1">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Id Number</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Role</th>
            <th scope="col">Shift Start</th>
            <th scope="col">Shift End</th>
            <th scope="col">Total Hour</th>
        </tr>
    </thead>

    <?php 
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) { 
            echo '<tr>';
            echo '<td>'.$cnt.'</td>'; 
            echo '<td>'.$shift_date = $row['shift_date'].'</td>'; 
            echo '<td>'.$emp_id = $row['emp_id'].'</td>'; 
            echo '<td>'.$emp_fname = $row['emp_fname'].'</td>';
            echo '<td>'.$emp_lame = $row['emp_lname'].'</td>'; 

            // Fetch the employee role
            $emp_role = $row['emp_role'];
            $roleSql = "SELECT role_name FROM role WHERE role_id = $emp_role";
            $roleResult = mysqli_query($conn, $roleSql);

            if ($roleResult && $roleRow = mysqli_fetch_assoc($roleResult)) {
                echo '<td>'.$roleRow['role_name'].'</td>';
            } else {
                echo '<td>Unknown Role</td>';
            } 

            echo '<td>'.$shift_start = $row['shift_start_time'].'</td>'; 
            echo '<td>'.$shift_end = $row['shift_end_time'].'</td>';	
            echo '<td>'.$total_hours = $row['total_hours'].'</td>';		
            echo '</tr>';

            $cnt++;
        }
    } else {
        echo '<tr><td colspan="9">No records found</td></tr>';
    }
    ?>
</table>

<?php
// Add the download button outside of the loop
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
