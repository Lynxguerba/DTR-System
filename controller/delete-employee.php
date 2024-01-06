<?php
// include 'session.php';
// include('database/config.php');

// if(isset($_GET['deleteId'])){
//     $emp_id = $_GET['deleteId'];

//     $sql = "DELETE FROM `employee` WHERE emp_id = $emp_id";
//     $result = mysqli_query($conn, $sql);

//     if($result){
//         echo "<script>confir('DELETE RECORD SUCCESSFULLY!');</script>";
//         header('Location: employee.php');
//     }else{
//         die("Connection Failed: " . mysqli_connect_error($conn));
//     }
// }
?>
<?php
include('database/config.php');

if (isset($_GET['deleteId'])) {
    $emp_id = $_GET['deleteId'];

    // Delete related records in the time_in table
    $deleteTimeInSql = "DELETE FROM `time_in` WHERE emp_id = ?";
    $stmtTimeIn = mysqli_prepare($conn, $deleteTimeInSql);
    mysqli_stmt_bind_param($stmtTimeIn, "i", $emp_id);
    $resultTimeIn = mysqli_stmt_execute($stmtTimeIn);

    if (!$resultTimeIn) {
        die("Error deleting related records in time_in table: " . mysqli_error($conn));
    }

    // Delete related records in the time_out table
    $deleteTimeOutSql = "DELETE FROM `time_out` WHERE emp_id = ?";
    $stmtTimeOut = mysqli_prepare($conn, $deleteTimeOutSql);
    mysqli_stmt_bind_param($stmtTimeOut, "i", $emp_id);
    $resultTimeOut = mysqli_stmt_execute($stmtTimeOut);

    if (!$resultTimeOut) {
        die("Error deleting related records in time_out table: " . mysqli_error($conn));
    }

    // Delete record in the employee table
    $deleteEmployeeSql = "DELETE FROM `employee` WHERE emp_id = ?";
    $stmtEmployee = mysqli_prepare($conn, $deleteEmployeeSql);
    mysqli_stmt_bind_param($stmtEmployee, "i", $emp_id);
    $resultEmployee = mysqli_stmt_execute($stmtEmployee);

    if ($resultEmployee) {
        echo "<script>alert('DELETE RECORD SUCCESSFULLY!');</script>";
        header('Location: employee.php');
    } else {
        die("Error deleting record in employee table: " . mysqli_error($conn));
    }
}
?>
