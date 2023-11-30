//get-updates.php
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Connect to the databas
include("database.php");

// Check if the User_ID session variable is set
if (isset($_SESSION['User_ID'])) {
    // Prepare a SQL statement to select the Balance from the users table
    $stmt = $conn->prepare("SELECT Balance FROM `users` WHERE User_ID = ?");
    
    // Bind the User_ID session variable to the SQL statement
    $stmt->bind_param("i", $_SESSION['User_ID']);
    
    // Execute the SQL statement
    $stmt->execute();
    
    // Get the result of the SQL statement
    $result = $stmt->get_result();
    
    // If the query returned one or more rows
    if ($result->num_rows > 0) {
        // Fetch the result into an associative array
        $row = $result->fetch_assoc();
        
        // Return the Balance
        echo $row['Balance'];
        $_SESSION['Balance'] = $row['Balance'];
    } else {
        // If no rows were returned, return an error message
        echo "User not found!";
    }
    
    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    // If the User_ID session variable is not set, return an error message
    echo "User not logged in!";
}
?>
