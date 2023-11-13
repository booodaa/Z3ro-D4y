<?php
session_start();
include("database.php");
$_SESSION['Client_name'];
$_SESSION['Email'];

if (!isset($_SESSION['Client_name'])) {
  // Redirect to login.php
  header("Location: login.php");
  exit;
}
?>