<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['Client_name']) || empty($_SESSION['Client_name'])) {
  // Redirect to login.php or any appropriate login page
  header("Location: login.php");
  exit;
}
?>