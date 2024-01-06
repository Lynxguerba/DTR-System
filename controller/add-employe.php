<?php
// include 'session.php';
    include('database/config.php');
    
    // ADDING EMPLOYEE
    if(isset($_POST['submit'])){
        $emp_id = $_POST['emp-id'];
        $emp_img= $_POST['emp-img'];
        $emp_fname= $_POST['emp-fname'];
        $emp_lname= $_POST['emp-lname'];
        $emp_initial = $_POST['emp-initial'];
        $emp_role = $_POST['emp-role'];
        $emp_conumber = $_POST['emp-contact'];         
        $emp_address = $_POST['emp-address'];
        $emp_email = $_POST['emp-email'];


        $sql = "INSERT INTO employee (emp_id, emp_image, emp_fname, emp_lname, emp_initial, emp_role ,emp_conumber, emp_address, emp_email)
        VALUES ('$emp_id', '$emp_img', '$emp_fname', '$emp_lname', '$emp_initial', '$emp_role' ,'$emp_conumber', '$emp_address', '$emp_email')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: employee.php");
        } else {
            echo "<script>alert('FAILED ADDING EMPLOYEE!');</script>";
        }

    }
?>
