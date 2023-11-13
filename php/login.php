<?php
session_start();
include("database.php");

if (isset($_POST['username'], $_POST['password'])) {
  $User_name = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM `users` WHERE BINARY User_name = ?");
  $stmt->bind_param("s", $User_name);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hash = $row['Password'];

    if (password_verify($password, $hash)) {
      // Login successful
    
      $_SESSION['User_ID'] = $row['User_ID'];
      $_SESSION['Client_name'] = $row['Client_name'];
      $_SESSION['User_name'] = $row['User_name'];
      $_SESSION['Email'] = $row['Email'];
      $_SESSION['Balance'] = $row['Balance'];

      echo "Login successful!";
      header("location: index.php");
      exit();
    } else {
      // Invalid password
      echo "Invalid password!";
    }
  } else {
    // User not found
    echo "User not found!";
  }

  $stmt->close();
  $conn->close();
}

?>
