<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password']) && isset($_POST['newpassword']) && isset($_POST['renewpassword'])) {
    $currentPassword = $_POST['password'];
    $newPassword = $_POST['newpassword'];
    $reNewPassword = $_POST['renewpassword'];

    if ($newPassword != $reNewPassword) {
        $modalTitle ='Error';
        $modalMessage = "New passwords do not match!";
    } elseif ($currentPassword == $reNewPassword || $currentPassword == $newPassword) {
        $modalTitle ='Error';
        $modalMessage = "Your current password is the same as the new!";
    } else {
        $userId = $_SESSION['User_ID'];
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE User_ID = ?");
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hash = $row['Password'];

            if (password_verify($currentPassword, $hash)) {
                $newHash = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateStmt = $conn->prepare("UPDATE `users` SET Password = ? WHERE User_ID = ?");
                $updateStmt->bind_param("ss", $newHash, $userId);
                $updateStmt->execute();

                $modalTitle ='Successfull';
                $modalMessage = "Password changed successfully!";
            } else {
                $modalTitle ='Error';
                $modalMessage = "Current password is incorrect!";
            }
        } else {
            $modalTitle ='Error';
            $modalMessage = "User not found!";
        }

        $stmt->close();
        $conn->close();
    }

    // Display modal with jQuery
    echo "<script type='text/javascript' src='https://code.jquery.com/jquery-3.6.4.min.js'></script>";
    echo "<script type='text/javascript'>
            $(document).ready(function() {
                $('#modalBody').text('" . $modalMessage . "');
                $('#popUpModalLabel').text('" . $modalTitle . "');
                $('#popUpModal').modal('show');
                
            });
          </script>";
}
?>