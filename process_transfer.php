<?php
session_start();
include("database.php");

if (!isset($_SESSION['Clint_name'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recipientId = filter_var($_POST['recipient_id'], FILTER_VALIDATE_INT);
    $amount = filter_var($_POST['amount'], FILTER_VALIDATE_FLOAT);

    if ($recipientId === false) {
        
    } elseif ($amount === false || $amount <= 0) {
        
    } else {
        $query = "SELECT User_ID, Balance FROM users WHERE User_ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $recipientId);
        $stmt->execute();

        $result = $stmt->get_result();
        $recipient = $result->fetch_assoc();

        if ($recipient) {
            $query = "SELECT User_ID, Balance FROM users WHERE User_ID = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $_SESSION['User_ID']);
            $stmt->execute();

            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user['Balance'] >= $amount) {
                if ($recipientId != $_SESSION['User_ID']) {
                    $newBalance = $user['Balance'] - $amount;
                    $updateQuery = "UPDATE users SET Balance = ? WHERE User_ID = ?";
                    $updateStmt = $conn->prepare($updateQuery);
                    $updateStmt->bind_param('ds', $newBalance, $_SESSION['User_ID']);
                    $updateStmt->execute();
                  
                    $newRecipientBalance = $recipient['Balance'] + $amount;
                    $updateRecipientQuery = "UPDATE users SET Balance = ? WHERE User_ID = ?";
                    $updateRecipientStmt = $conn->prepare($updateRecipientQuery);
                    $updateRecipientStmt->bind_param('ds', $newRecipientBalance, $recipientId);
                    $updateRecipientStmt->execute();
                  
                    echo 'Transaction successful';
                } elseif ($recipientId == $_SESSION['User_ID']) {
                    echo 'Cannot transfer money to yourself';
                } else {
                    echo 'Insufficient balance';
                }
                  
            } else {
                echo 'Insufficient balance';
            }
        } else {
            echo 'Wrong ID for recipient';
        }
    }
}
?>