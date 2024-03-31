<?php
// Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start output buffering
ob_start();

// Start session
session_start();

// Check if the user is logged in
if(isset($_SESSION['Username'])) {
    unset($_SESSION['Username']);  // Unset the session variable
}

// Destroy the session
session_destroy();

// Redirect to the sign-in page after logout
header("Location: http://localhost/FRW/signin.html");
exit();

// Flush the output buffer
ob_end_flush();
?>
