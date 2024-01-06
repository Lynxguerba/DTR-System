<?php 
include 'session.php';
require_once 'sidebar.php';
require_once 'background.php';
include('controller/update-employee.php');
include 'database/config.php';

$sql = "SELECT role_id, role_name FROM role";
    $result = mysqli_query($conn, $sql);

    // CHECK IF THE QUERY WAS SUCCESSFUL
    if ($result) {
        $options_role = ""; //INITIALIZE AN EMPTY STRING TO STORE THE OPTIONS

        // LOOP THROUGH THE RESULT AND CREATE AN OPTION FOR EACH EMPLOYEE ID
        while ($row = mysqli_fetch_assoc($result)) {
            $options_role .= "<option value='{$row['role_id']}'>{$row['role_name']}</option>";
        }
    } else {
        // HANLDE THE CASE WHEN THE QUERY FAILS
        $options_role = "<option value='' disabled selected>No ID available</option>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTR SYSTEM</title>

    <!-- CUSTOME CSS -->
    <link rel="stylesheet" href="assets/css/emp-update.css">

</head>
<body>

    <div class="container" style=" width:75%; transform: translateX(100px);">
        
    <!-- EMPLOYEE LIST -->
        <div class="employee-list mt-5">
            <!-- HEADER -->
            <div class="header p-3 bg-dark d-grid align-items-center">
                <p class="fs-3 fw-bold text-light">Update Employee</p>
            </div>

            <!-- MAIN -->
            <!-- BACK BUTTON TO EMPLOYEE.PHP -->
            <span class="backButton" id="backButton">
                <div class="button-box">
                    <span class="button-elem">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 40">
                            <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                        </svg>
                    </span>
                    <span class="button-elem">
                        <svg viewBox="0 0 46 40">
                            <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                        </svg>
                    </span>
                </div>  
            </span>


            <form action="" method="post" class="updateForm">

                <div class="form1 d-flex row">

                    <div class="inst-photo col-4">
                        <div style="transform: translate(70px, 20px);">
                            <?php
                            echo  '<img src="images/'. $emp_image.'" alt="empty-photo" id="profile-pic">'
                            ?>
                            <label for="input-file" title="OPEN FOLDER" class="bg-secondary" id="label-input-img" name="emp-img" style="transform: translate(20px,10px);">Update Image</label>
                            <input type="file" accept="image/jpeg, image/jpg, image/png," id="input-file" style="opacity: 0;" name="emp-img" required>
                        </div>
                    </div>

                    <div class="flm col-8 d-grid align-items-end">

                        <div class="d-flex">
                            <div class="form-floating mb-3" style="width: 100%;" >
                                <input type="text" name="emp-fname" required class="form-control" id="floatingInput" placeholder="name@example.com"  value="<?php echo $emp_fname ?>" >
                                <label for="floatingInput">Firstname</label>  
                            </div>
                            <div style="width: 30px;"></div>
                            <div class="form-floating mb-3" style="width: 100%;">
                                <input type="text" name="emp-lname"  required class="form-control" id="floatingInput" placeholder="name@example.com"  value="<?php echo $emp_lname ?>">
                                <label for="floatingInput">Lastname</label>  
                            </div>
                            <div style="width: 30px;"></div>
                            <div class="form-floating mb-3"  style="width: 100%;">
                                <input type="text" name="emp-initial" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $emp_initial ?>" >
                                <label for="floatingInput">Middle Initial</label>  
                            </div>
                        </div>
                        <div class="form-floating mb-3" style="width: 100%;">
                            <select name="emp-role" required class="form-control" id="selectId">
                                <option value="" disabled selected>Select Role</option>

                                <?php echo $options_role; ?>
                                <!-- DISPLAY MORE OPTIONS -->
                            </select>
                            <label for="selectId">Role</label>
                        </div>
                        <div class="d-flex">
                            <div class="form-floating mb-3"  style="width: 100%;">
                                <input type="number" name="emp-contact"  required class="form-control" id="floatingInput" placeholder="name@example.com"  value="<?php echo $emp_conumber?>">
                                <label for="floatingInput">Contact Number</label>  
                            </div>

                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="emp-address"  required class="form-control" id="floatingInput" placeholder="name@example.com" style="width: 100%;" value="<?php echo $emp_address?>">
                            <label for="floatingInput">Address</label>  
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="emp-email"  required class="form-control" id="floatingInput" placeholder="name@example.com" style="width: 100%;" value="<?php echo $emp_email ?>">
                            <label for="floatingInput">Email</label>  
                         </div>
                    </div>
                </div>
            
                <button class="btn btn-secondary" type="submit" name="submit" onclick="return alert('RECORD UPDATED SUCCESSFUL!')" style="width: 100%;">
                    <span name="submit" style="width: 5px;"></span>
                    UPDATE RECORD
                </button>
            </form>
                        
        </div>

    </div>

    <script>
        // UPLOAD PROFILE PICTURE ------------------------------------------------
        let profilePic = document.getElementById('profile-pic');
        let inputFile = document.getElementById('input-file');
        inputFile.onchange = function(){
            profilePic.src = URL.createObjectURL(inputFile.files[0]);
        }

        // BACK BUTTON-------------------------------------------------------
        document.getElementById('backButton').addEventListener('click', function() {
        // Redirect to employee.php when the button is clicked
        window.location.href = 'employee.php';
    });
   
</script>
</body>
</html>