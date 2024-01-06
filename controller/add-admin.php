<?php 
// include 'session.php';
require_once 'database/config.php';

// if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])) {
//     echo "User is not logged in. Redirecting to login page.";
//     header('location: http://localhost/DTR_System/index.php');
//     exit();
// }

if(isset($_POST['submit'])){
    $emp_id = $_POST['emp_id'];   
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql =  "INSERT INTO users (emp_id, username, password)
    VALUES('$emp_id', '$username', '$password')";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location:admin.php');
    }
    mysqli_close($conn);
}
?>