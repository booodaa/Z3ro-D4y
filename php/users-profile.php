<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("database.php");
$_SESSION['Client_name'];
$_SESSION['Email'];

if (!isset($_SESSION['Client_name']) || !isset($_SESSION['Email'])) {
  // Redirect to login.php
  header("Location: login.php");
  exit;
}
?>