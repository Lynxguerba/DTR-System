<?php 
include 'session.php';
require_once 'sidebar.php';
require_once 'background.php';
include('database/config.php');
include('controller/add-employe.php');

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
<?php
function generateIdNumber(){
    return rand(1000, 9999);
}
$randId = generateIdNumber();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTR SYSTEM</title>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/css/employee.css">
</head>
<body>

    <div class="container" style=" width:75%; transform: translateX(100px);">
        
    <!-- EMPLOYEE LIST -->
        <div class="employee-list mt-5">
            <!-- HEADER -->
            <div class="header p-3 bg-dark d-grid align-items-center">
                <p class="fs-3 fw-bold text-light">Employee List</p>
            </div>

            <!-- MAIN -->
            <div class="main mt-4">

                <div class="add-search d-flex align-items-center justify-content-between" style="width: 100%;">

                    <!-- SEARCH -->
                    <!-- <div class="d-flex">
                        <p class="fw-bold" style="transform: translateY(5px);">Search:&nbsp;</p>
                        <input type="text" id="emp-search" name="emp-search">
                    </div> -->
                    <div class="form-floating mb-3" style="width: 50vh;">
                        <input type="text" name="emp-seacrh" required class="form-control" id="emp-search"  placeholder="name@example.com" >
                        <label for="floatingInput">
                        <img src="images/search.png" alt="" height="15" width="15">    
                        Search</label>  
                    </div>

                    <div class="add-btn">

                        <div class="conts">

                        <!-- BUTTON TO SHOW MODAL -->
                        <span class="show-modal backButton">
                            <button  class="text-light btn btn-secondary">Add New
                            <img src="images/add.png" alt="add-emps">
                            </button>
                            
                        </span>


                        <!-- LOG IN FORM MODAL -->
                        <span class="overlay"></span>

                        <div class="modal-box p-5">
                            
                            <button class="close-btn" style="transform: translate(50px, -30px);">
                                <img src="images/close.png" alt="closeBtn" style="width: 34px; height: 34px;">
                            </button>

                            <div class="login-form-admin">
                                <div class="header-divs d-flex">
                                    <!-- <img src="images/user_icon.png" alt="" style="width:50px; height: 50px; transform: translateY(-5px);">
                                    <span style="width: 10px;"></span> -->
                                    <h2 class="fw-bold text-center">Add New Employee</h2>
                                </div> <br>
                                
                                <form action="" method="post">

                                    <div class="form1 d-flex row">
                                        <div class="inst-photo col-3">
                                            <img src="images/empty-prof.png" alt="empty-photo" id="profile-pic" style="transform: translateX(25px);">
                                            <label for="input-file" id="label-input-img"  style="transform: translate(20px,10px);">Insert Image</label>
                                            <input type="file" accept="image/jpeg, image/jpg, image/png," id="input-file" style="opacity: 0;" name="emp-img">
                                        </div>
                                        <div class="flm col-9 d-grid align-items-end">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="emp-fname" required class="form-control" id="floatingInput" autocomplete="off" placeholder="name@example.com" style="width: 100%;">
                                                <label for="floatingInput">Firstname</label>  
                                            </div>
                                            <div style="width: 10px;"></div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="emp-lname" required class="form-control" id="floatingInput" autocomplete="off" placeholder="name@example.com" style="width: 100%;">
                                                <label for="floatingInput">Lastname</label>  
                                            </div>
                                            <div style="width: 10px;"></div>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="emp-initial" class="form-control" id="floatingInput" autocomplete="off" placeholder="name@example.com" style="width: 100%;">
                                                <label for="floatingInput">Middle Initial</label>  
                                            </div>

                                            
                                        </div>

                                        <div class="d-flex">
                                            <div class="form-floating mb-3" >
                                                <input type="hidden" name="emp-id" required class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $randId?>">
                                            </div>
                                            <div class="form-floating mb-3" style="width: 100%;">
                                                <select name="emp-role" required class="form-control" id="selectId">
                                                    <option value="" disabled selected>Select Role</option>
                                                    <?php echo $options_role; ?>
                                                    <!-- DISPLAY MORE OPTIONS =========================================================-->
                                                </select>
                                                <label for="selectId">Role</label>
                                            </div>
                                            <span style="width: 20px;"></span>
                                            <div class="form-floating mb-3" style="width:100%">
                                            <input type="text" name="emp-contact" required class="form-control" id="emp-contact" autocomplete="off" placeholder="name@example.com" maxlength="12">
                                            <label for="emp-contact">Contact Number</label>                                     
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="d-flex">
                                        <div class="form-floating mb-3" style="width:100%">
                                                    <input type="text" name="emp-address" required class="form-control"  autocomplete="off" id="floatingInput" placeholder="name@example.com" >
                                                    <label for="floatingInput">Address</label>  
                                        </div>
                                        <span style="width: 20px;"></span>
                                        <div class="form-floating mb-3" style="width:100%">
                                                    <input type="email" name="emp-email" required class="form-control" autocomplete="off" id="floatingInput" placeholder="name@example.com" >
                                                    <label for="floatingInput">Email</label>  
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" name="submit" style="width: 100%;" onclick="return alert('NEW EMPLOYEE ADDED')">
                                        <span style="width: 5px;"></span>
                                        ADD EMPLOYEE
                                    </button>
                                </form>
                            </div>  
                        </div>

                        </div>
                    </div>
                </div>

                <div class="table-employee container" style="padding: 0; overflow-y: auto; height: 390px;">
            
                    <table class="table table-striped">
                        <thead class="table-dark" style="position: sticky; top: 0;">
                            <tr>
                            <th>ID Number</th>
                            <th>Profile</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Role</th>
                            <th>Date Join</th>
                            <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM `employee`";
                                $result = mysqli_query($conn, $sql);

                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $emp_id = $row['emp_id'];
                                        $emp_image = $row['emp_image'];
                                        $emp_fname= $row['emp_fname'];
                                        $emp_lname= $row['emp_lname'];
                                        $emp_role = $row['emp_role'];  
                                        $emp_date_join = $row['emp_date_reg'];
                                        
                                        echo '  <tr id="emp-row-' . $emp_id . '">';
                                        echo '   <th scope="row">' . $emp_id . '</th>';
                                        echo '<td><img src="images/' . $emp_image . ' " style="width: 50px; height: 50px; border-radius: 50%;"></td>';
                                        echo'      <td>' . $emp_fname . '</td>';
                                        echo '     <td>' . $emp_lname . '</td>
                                        <td>';
                                                // CHANGE THE ROLE_ID TO ROLE_NAME
                                                $roleSql = "SELECT role_name FROM role WHERE role_id = $emp_role";
                                                $roleResult = mysqli_query($conn, $roleSql);
                                                
                                                if ($roleResult && $roleRow = mysqli_fetch_assoc($roleResult)) {
                                                    echo $roleRow['role_name'];
                                                } else {
                                                    echo 'Unknown Role';
                                                } 
                                        echo  '</td>
                                                <td>' . $emp_date_join . '</td>
                                                <td class="d-flex justify-content-evenly" style="height: 78px;">
                                                    <a href="emp_view.php?viewId=' . $row['emp_id'] . '" class="btnOpeDlt d-grid align-items-center">
                                                        <image src="images/read.png" alt="crud" style="width: 20px; height: 20px;" title="View"/>
                                                    </a>
                                                    <a href="emp_update.php?updateId=' . $row['emp_id'] . '" class="btnOpeUpt d-grid align-items-center" ">
                                                        <image src="images/edit.png" alt="crud" style="width: 20px; height: 320x;" title="Update"/>
                                                    </a>
                                                    <a href="emp_delete.php?deleteId=' . $row['emp_id'] . '" class="btnOpeDlt d-grid align-items-center"  onclick="return confirm(\'Are you sure to DELETE '. $emp_fname .' ' . $emp_lname.' record?\')">
                                                        <image src="images/trash.png" alt="crud" style="width: 20px; height: 20px;" title="Delete"/>
                                                    </a>
                                                </td>
                                            </tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/modal.js"></script>
    <script src="assets/js/emp-searchbar.js"></script>
    <style>
        #no-record-row {
        height: 100px;
        text-align: center; 
        font-size: 3em; /* SET THE HEIGHT for the "NO RECORD FOUND!" ROW */
    }
    </style>
    <script src="assets/js/employee.js"></script>
</body>
</html>