<?php 
// include 'session.php';
include 'database/config.php';

$emp_id = $_GET['viewId'];
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
$emp_date_join = $row['emp_date_reg'];

?>