<?php
    session_start();
  
    if (!isset($_SESSION['username'])) {
        // header("Location: ../index.php");
        header("Location: http://localhost/DTR_System/index.php");
        exit();
    }
    
      // require_once 'database/config.php';
    
    // if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])) {
    //     echo "User is not logged in. Redirecting to login page.";
    //     header('location: http://localhost/DTR_System/index.php');
    //     exit();
    // }

?>