<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("database.php");

if (isset($_POST['username'], $_POST['password'])) {
  $User_name = trim($_POST['username']);
  $password = $_POST['password'];

  // Sanitize user input
  $User_name = htmlspecialchars($User_name, ENT_QUOTES, 'UTF-8');

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

      //echo "Login successful!";
      header("location: index.php");
      exit();
    } else {
      // User not found or invalid password
      $modalMessage = "wrong password!"; // You can change this message based on the error
      echo "<script type='text/javascript'>
              window.onload = function() {
                  document.getElementById('modalBody').innerText = '".$modalMessage."';
                  $('#popUpModal').modal('show');
              };
            </script>";
  }
  } else {
    // User not found
    $modalMessage = "User not found"; // You can change this message based on the error
    echo "<script type='text/javascript'>
            window.onload = function() {
              
                document.getElementById('modalBody').innerText = '".$modalMessage."';
               // $('#popUpModal .modal-dialog').addClass('modal-dialog-centered');
                $('#popUpModal').modal('show');
            };
          </script>";  }

  $stmt->close();
  $conn->close();
}

?>