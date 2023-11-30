<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("database.php");
if (!isset($_SESSION['Client_name'])) {
  header("Location: login.php");
  exit;
}
?>