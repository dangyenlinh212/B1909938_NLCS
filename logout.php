<?php
session_start();

// Unset the session variable representing the user's login status
unset($_SESSION['customer_login']);

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you want
header("Location: login.php");
exit();
?>