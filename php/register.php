<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $Client_name =  trim(htmlspecialchars($_POST['name']));
  $Email = trim(htmlspecialchars($_POST['email']));
  $User_name = trim(htmlspecialchars($_POST['username']));
  $password = htmlspecialchars($_POST['password']);
  $terms = trim(htmlspecialchars($_POST['terms']));
  $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
  $sql = "INSERT INTO `users` (User_name, Client_name, Email, Password) VALUES ('$User_name', '$Client_name', '$Email', '$hash')";

  try {
    if (mysqli_query($conn, $sql)) {
      //echo "Registration successful!";
      $modalMessage = "Registration successful!"; // You can change this message based on the error
      echo "<script type='text/javascript'>
              window.onload = function() {
                  document.getElementById('modalBody').innerText = '".$modalMessage."';
                  $('#popUpModal').modal('show');
              };
            </script>";
      header("Location: login.php"); // Redirect to login.php
      exit();
    }
  } catch (mysqli_sql_exception $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
      //echo "Username already exists. Please choose a different username.";

      $modalMessage = "Username already exists. Please choose a different username!"; // You can change this message based on the error
      echo "<script type='text/javascript'>
              window.onload = function() {
                  document.getElementById('modalBody').innerText = '".$modalMessage."';
                  $('#popUpModal').modal('show');
              };
            </script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}

mysqli_close($conn);
?>