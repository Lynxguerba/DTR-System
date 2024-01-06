<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'system_development';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // CONDITION IF THE DATABSE IS CONNECT
    if(!$conn){
        die('FIALED TO CONNECT');
    }
    // else{
    //     echo "SUCCESS!";
    // }
?>