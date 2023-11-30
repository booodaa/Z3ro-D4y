<?php
include('database.php');

// Start or resume the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $Client_name = trim(htmlspecialchars($_POST['fullName']));
    $User_name = trim(htmlspecialchars($_POST['username']));
    $Email = trim(htmlspecialchars($_POST['email']));

    // Check if the username already exists for a different user
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE User_name = ? AND User_ID != ?");
    $stmt->bind_param("si", $User_name, $_SESSION['User_ID']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $modalMessage = "Username already exists for another user.";
    } else {
        // No duplicate found, proceed with update
        $sql = "UPDATE users SET Client_name=?, User_name=?, Email=? WHERE User_ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $Client_name, $User_name, $Email, $_SESSION['User_ID']);
        
        if ($stmt->execute()) {
            // Update session variables
            $_SESSION['Client_name'] = $Client_name;
            $_SESSION['User_name'] = $User_name;
            $_SESSION['Email'] = $Email;
    
            // Success message
            $modalMessage = "User information updated successfully.";
        } else {
            // Handle error during update
            // You can log this error or display a message
            $modalMessage = "Error updating user information.";
        }
    }

    // Display modal with jQuery
    echo "<script type='text/javascript' src='https://code.jquery.com/jquery-3.6.4.min.js'></script>";
    echo "<script type='text/javascript'>
            $(document).ready(function() {
                $('#modalBody').text('" . $modalMessage . "');
                $('#popUpModal').modal('show');
            });
          </script>";
}
?>
