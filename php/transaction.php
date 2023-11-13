<?php
session_start();
include("database.php");
if (!isset($_SESSION['Client_name'])) {
  header("Location: login.php");
  exit;
}
?>