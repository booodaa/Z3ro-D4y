<?php
session_start();
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST['password'];
    $newPassword = $_POST['newpassword'];
    $reNewPassword = $_POST['renewpassword'];

    if ($newPassword != $reNewPassword) {
        echo "New passwords do not match!";
        exit();
    }
    if ($currentPassword == $reNewPassword || $currentPassword == $newPassword) {
        echo "Your current assword is the same as the new!";
        exit();

    }
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

            echo "Password changed successfully!";
        } else {
            echo "Current password is incorrect!";
        }
    } else {
        echo "User not found!";
    }

    $stmt->close();
    $conn->close();
}
?>
