<?php
    // Start the session
    session_start();

    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the sign-in page
    header("Location: signin.html");
    exit();
?>
