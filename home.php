<?php
session_start();

if(isset($_SESSION['username'])) {
  echo "Willkommen, " . $_SESSION['username'] . "!";
} else {
  header("location: login.php");
  exit();
}
?>
