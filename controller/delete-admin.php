<?php
// include 'session.php';
include('database/config.php');

if(isset($_GET['deleteId'])){
    $emp_id = $_GET['deleteId'];

    $sql = "DELETE FROM `users` WHERE emp_id = $emp_id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('Location: admin.php');
    }else{
        die("Connection Failed: " . mysqli_connect_error($conn));
    }
}
?>