
<?php
    include 'session.php';
    require_once 'background.php';
    require_once 'sidebar.php';
    include('database/config.php');
    include('controller/add-admin.php');

// RETRIEVE EMPLOYEE IDS FROM THE DATABASE
    $sql = "SELECT emp_id, emp_fname FROM employee";
    $result = mysqli_query($conn, $sql);

    // CHECK IF THE QUERY WAS SUCCESSFUL
    if ($result) {
        $options = ""; //INITIALIZE AN EMPTY STRING TO STORE THE OPTIONS

        // LOOP THROUGH THE RESULT AND CREATE AN OPTION FOR EACH EMPLOYEE ID
        while ($row = mysqli_fetch_assoc($result)) {
            $options .= "<option value='{$row['emp_id']}'>{$row['emp_id']}</option>";
        }
    } else {
        // HANLDE THE CASE WHEN THE QUERY FAILS
        $options = "<option value='' disabled selected>No ID available</option>";
    }
?> 
<head>

    <link rel="stylesheet" href="assets/css/admin.css">
   
</head>
<body>  
    <div class="container d-flex justify-content-between">
        
        <!-- ADD ADMIN -->
        <div class="conatiner add-admin d-grid">
            
            

            

        </div>


        <!-- ADMIN LIST -->
        <div class="conatiner admin-list mt-5">
           
            
            <!-- MAIN TABLE ADD ADMIN -->
            <div class="main mt-5 p-3">
            <div class="mt-5" style="height: 300px;overflow-y: auto;">
            
    <a href="session_destroy.php" onclick="return confirm('ARE YOU SURE YOU WANT TO LOG OUT?')">
         <button class="btn btn-danger"> LOG OUT
            <img src="images/power.png" alt="power-button">
         </button> 
    </a>
    
        </div>
        
    </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          
            var selectId = document.getElementById("selectId");
            var empNameInput = document.getElementById("floatingInput");

          
            selectId.addEventListener("change", function () {
                // Set the value of the input field to the selected employee's name
                empNameInput.value = selectId.options[selectId.selectedIndex].getAttribute("data-emp-name");
            });

            // Trigger change event on page load to populate name based on default selected ID
            var event = new Event("change");
            selectId.dispatchEvent(event);
        });
    </script>
    
</body>
