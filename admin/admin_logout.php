<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start();

session_start();

// Check if the user is logged in
if(isset($_SESSION['Username'])) {
    unset($_SESSION['Username']);
}

session_destroy();

// Redirect to the sign-in page after logout
header("Location: http://localhost/FRW/signin.html");
exit();

ob_end_flush();
?>
