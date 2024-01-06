<?php
// include 'session.php';
include 'database/config.php';

$emp_id = $_GET['updateId'];
$sql = "SELECT * FROM `employee` WHERE emp_id = $emp_id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
$emp_id = $row['emp_id'];
$emp_image = $row['emp_image'];
$emp_fname = $row['emp_fname'];
$emp_lname = $row['emp_lname'];
$emp_initial = $row['emp_initial'];
$emp_role = $row['emp_role'];
$emp_conumber = $row['emp_conumber'];
$emp_address = $row['emp_address'];
$emp_email = $row['emp_email'];


if (isset($_POST['submit'])) {
    $emp_image = $_POST['emp-img'];
    $emp_fname = $_POST['emp-fname'];
    $emp_lname = $_POST['emp-lname'];
    $emp_initial = $_POST['emp-initial'];
    $emp_role = $_POST['emp-role'];
    $emp_conumber = $_POST['emp-contact'];
    $emp_address = $_POST['emp-address'];
    $emp_email = $_POST['emp-email'];

    $sql = "UPDATE `employee` SET `emp_image`='$emp_image',
    `emp_fname`='$emp_fname',`emp_lname`='$emp_lname',`emp_initial`='$emp_initial', emp_role = '$emp_role',
    `emp_conumber`='$emp_conumber',`emp_address`='$emp_address',`emp_email`='$emp_email'
    WHERE emp_id = $emp_id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('UPDATED RECORD SUCCESSFULLY!');</script>";
        header('location:employee.php');
    }
    // else {
    //     die("Error: " . $sql . "<br>" . mysqli_error($conn));
    // }
    mysqli_close($conn);
}
?>