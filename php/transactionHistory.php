<?php
include("database.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['User_ID'])) {
    echo "User not logged in!";
    exit();
}

$userId = $_SESSION['User_ID'];
$stmt = $conn->prepare("SELECT * FROM `transactions` WHERE Sender_ID = ? OR Receiver_ID = ?");
$stmt->bind_param("ii", $userId, $userId);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Here you can access each column of the row
        echo "Transaction ID: " . $row['Transaction_ID'] . ", Sender ID: " . $row['Sender_ID'] . ", Receiver ID: " . $row['Receiver_ID'] . ", Amount: " . $row['Amount'] . ", Transaction Type: " . $row['Transaction_Type'] . ", Transaction Date: " . $row['Transaction_Date'] . "<br>";
    }
} else {
    echo "No transactions found for this user.";
}

$stmt->close();
$conn->close();
?>