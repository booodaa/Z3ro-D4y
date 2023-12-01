<?php
include("database.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$transactions = array(); // Initialize $transactions as an empty array

if (!isset($_SESSION['User_ID'])) {
    echo "User not logged in!";
    exit();
}

$userId = $_SESSION['User_ID'];
$stmt = $conn->prepare("SELECT * FROM `transactions` WHERE Sender_ID = ? OR Receiver_ID = ? ORDER BY Transaction_Date DESC");
$stmt->bind_param("ii", $userId, $userId);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }
} else {
    echo "No transactions found for this user.";
}

$stmt->close();
$conn->close();
?>