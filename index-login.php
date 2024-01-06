
<?php

session_start();

include('database/config.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    
    // Function to validate input data (prevent SQL injection and other attacks)
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } 

    $username = validate($_POST['username']); // Get username from the form
    $password = validate($_POST['password']); // Get password from the form

    if (empty($username)) {
        // Redirect to login page with an error message if username is empty
        header("Location: index.php?error=Username is required");
        exit();
    } else if (empty($password)) {
        // Redirect to login page with an error message if password is empty
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Check if the username and password match the retrieved record
            if ($row['username'] === $username && $row['password'] === $password) {
                $_SESSION['username'] = $row['username']; // Set the username in the session
                // Additional session variables can be set here if needed
                header("Location: http://localhost/DTR_System/dashboard.php");// Redirect to the home page
                exit();
            } else {
                // Redirect to login page with an error message if username doesn't match
                header("Location: index.php?error=Username does not exist");
                exit();
            }
        } else {
            // Redirect to login page with an error message if password doesn't match
            header("Location: index.php?error=Password does not match");
            exit();
        }
    }
}
?>
