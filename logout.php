<?php
session_start(); // Start the session

// Destroy all session data
session_destroy();

// Redirect to the login page or any other page as needed
header("Location: login.php"); // Replace "login.php" with your login page URL
exit();
?>