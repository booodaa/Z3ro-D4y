<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $Client_name =  trim(htmlspecialchars($_REQUEST['name']));
  $Email = trim(htmlspecialchars($_REQUEST['email']));
  $User_name = trim(htmlspecialchars($_REQUEST['username']));
  $password = htmlspecialchars($_REQUEST['password']);
  $terms = trim(htmlspecialchars($_REQUEST['terms']));
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO `users` (User_name, Client_name, Email, Password) VALUES ('$User_name', '$Client_name', '$Email', '$hash')";

  try {
    if (mysqli_query($conn, $sql)) {
      echo "Registration successful!";
      header("Location: ../login.php"); // Redirect to login.php
      exit();
    }
  } catch (mysqli_sql_exception $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
      echo "Username already exists. Please choose a different username.";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}

mysqli_close($conn);
?>
