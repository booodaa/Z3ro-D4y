<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("database.php");

if (!isset($_SESSION['Client_name'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recipientId = filter_var($_POST['recipient_id'], FILTER_VALIDATE_INT);
    $amount = filter_var($_POST['amount'], FILTER_VALIDATE_FLOAT);

    if ($recipientId === false || $amount === false || $amount <= 0) {
        echo 'Invalid input';

        exit;
    }

    $conn->begin_transaction();

    try {
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

                    $transactionQuery = "INSERT INTO transactions (Sender_ID, Receiver_ID, Amount, Transaction_Type) VALUES (?, ?, ?, 'send')";
                    $transactionStmt = $conn->prepare($transactionQuery);
                    $transactionStmt->bind_param('dds', $_SESSION['User_ID'], $recipientId, $amount);
                    $transactionStmt->execute();
                    $conn->commit();

                    $transactionDetails = <<<DETAILS
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Recipient ID: $recipientId</li>
                        <li class="list-group-item">Amount Transferred: \${$amount}</li>
                    </ul>
                    DETAILS;

                    $modalMessage = "Transaction successful!"; // You can change this message based on the error
                    echo "<script type='text/javascript'>
                    window.onload = function() {
                        // Set the contents of the modal body
                        document.getElementById('modalBody').innerHTML = '<h5>Transaction successful!</h5>' + `{$transactionDetails}`;
                        // Update the modal title
                        document.getElementById('popUpModalLabel').innerText = 'Transaction Successful';
                        // Show the modal
                        var modal = new bootstrap.Modal(document.getElementById('popUpModal'));
                        modal.show();
                    };
                </script>";
        
                } else {

                    $modalMessage = "Cannot transfer money to yourself!"; // You can change this message based on the error
                echo "<script type='text/javascript'>
              window.onload = function() {
                  document.getElementById('modalBody').innerText = '" . $modalMessage . "';
                  $('#popUpModal').modal('show');
              };
            </script>";
                }
            } else {
                $modalMessage = "Insufficient balance!"; // You can change this message based on the error
                echo "<script type='text/javascript'>
              window.onload = function() {
                  document.getElementById('modalBody').innerText = '" . $modalMessage . "';
                  $('#popUpModal').modal('show');
              };
            </script>";
            }
        } else {
            $modalMessage = "Wrong ID for recipient!"; // You can change this message based on the error
            echo "<script type='text/javascript'>
          window.onload = function() {
              document.getElementById('modalBody').innerText = '" . $modalMessage . "';
              $('#popUpModal').modal('show');
          };
        </script>";
        }
    } catch (Exception $e) {
        $conn->rollback();
        $modalMessage = "Error"; // You can change this message based on the error
            echo "<script type='text/javascript'>
          window.onload = function() {
              document.getElementById('modalBody').innerText = '" . $modalMessage . "';
              $('#popUpModal').modal('show');
          };
        </script>" . $e->getMessage();
    }
}
