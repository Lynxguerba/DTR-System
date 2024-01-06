<?php

    include('database/config.php');

    // COUNT THE EMPLOYEE =========================================================
    $sql = "SELECT COUNT(*) AS count_employee FROM employee";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $count_employee = $row['count_employee'];
    }

    // COUNT THE ADMIN ============================================================
    $sql = "SELECT COUNT(*) AS count_admin FROM users";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $count_admin = $row['count_admin'];
    }         

    // COUNT THE TIME IN ==========================================================
    $sql = "SELECT COUNT(*) AS count_timein FROM time_in";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $count_timeIn = $row['count_timein'];
    }          

    // COUNT THE TIME OUT =========================================================
    $sql = "SELECT COUNT(*) AS count_timeout FROM time_out";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $count_timeOut = $row['count_timeout'];
    }          
?>