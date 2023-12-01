<?php
include('database.php');

// Start or resume the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fullName']) || isset($_POST['username']) || isset($_POST['email']) ) {
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
        $modalTitle = 'Error';
        $modalMessage = "Username already exists for another user.";
    } else {
        // No duplicate found, proceed with update
        $sql = "UPDATE users SET Client_name=?, User_name=?, Email=? WHERE User_ID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $Client_name, $User_name, $Email, $_SESSION['User_ID']);

        // Check if the user has changed their current value
        if ($User_name != $_SESSION['User_name']) {
            // User has changed their username, proceed with update
            if ($stmt->execute()) {
                // Update session variables
                $_SESSION['Client_name'] = $Client_name;
                $_SESSION['User_name'] = $User_name;
                $_SESSION['Email'] = $Email;

                // Success message
                $modalTitle = 'Successfull';
                $modalMessage = "User information updated successfully.";
            } else {
                // Handle error during update
                // You can log this error or display a message
                $modalTitle = 'Error';
                $modalMessage = "Error updating user information.";
            }
        } else {
            // User has not changed their username, display a message
            $modalTitle = 'Info';
            $modalMessage = "No changes were made to the user information.";
        }
    }

    // Display modal with jQuery
    // Display modal with jQuery
    echo "<script type='text/javascript' src='https://code.jquery.com/jquery-3.6.4.min.js'></script>";
    echo "<script type='text/javascript'>
        $(document).ready(function() {
            $('#modalBody').text('" . $modalMessage . "');
            $('#popUpModalLabel').text('" . $modalTitle . "');
            $('#popUpModal').modal('show');
            
            // Add color to the message based on the modal title
            if ($('#popUpModalLabel').text() === 'Successfull') {
                $('#modalBody').addClass('text-success');
            } else if ($('#popUpModalLabel').text() === 'Error') {
                $('#modalBody').addClass('text-danger');
            } else {
                $('#modalBody').addClass('text-info');
            }
        });
    </script>";
}
?>  