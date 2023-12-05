<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("database.php"); // Include your database connection script

if (isset($_POST['darkMode'])) {
    
    $_SESSION['dark_mode'] = $_POST['darkMode'] ? 1 : 0;

    $darkMode = $_POST['darkMode'] ? 1 : 0;

    $userId = $_SESSION['User_ID']; // Get the user's ID from the session

    // Prepare an SQL statement for execution
    $stmt = $conn->prepare("UPDATE users SET dark_mode = ? WHERE User_ID = ?");
    
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ii", $darkMode, $userId);
    
    // Attempt to execute the prepared statement
    if($stmt->execute()){
        // It worked, so fetch the result (if any)
        $result = $stmt->get_result();
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}
?>