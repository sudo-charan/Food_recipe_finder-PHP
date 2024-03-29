<?php
session_start();

// Set timezone to Kolkata
date_default_timezone_set('Asia/Kolkata');

// Establish connection to the database
$db = new mysqli("localhost", "root", "", "recipe");

if ($db->connect_error) {
    die ("Connection failed: " . $db->connect_error);
}

// Check if username, password, and email are provided
if (isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Store the password without hashing
    $email = $_POST['email'];

    // Current date and time
    $signup_date = date("Y-m-d");
    $signup_time = date("H:i:s");  // 24-hour format with seconds

    // Check if username already exists
    $check_query = "SELECT * FROM users WHERE Username = ?";
    $stmt = $db->prepare($check_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the username already exists, display an error message
    if ($result->num_rows > 0) {
        echo '<script>alert("Username is already taken. Please choose another username!");
            window.location.href = "signup.html";</script>';
        exit(); // Stop further execution
    } else {
        // Insert new user into the database
        $insert_query = "INSERT INTO users (Username, Password, Email, signup_date, signup_time) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($insert_query);
        $stmt->bind_param("sssss", $username, $password, $email, $signup_date, $signup_time);
        
        // If the insertion is successful, redirect the user to the sign-in page
        if ($stmt->execute()) {
            header('Location: signin.html');
            exit();
        } else {
            // If there's an error during insertion, display the error message
            echo "Error: " . $insert_query . "<br>" . $db->error;
        }
    }
} else {
    // Redirect to the signup form if data is not provided
    header('Location: signup.html');
    exit();
}

// Close prepared statement and database connection
$stmt->close();
$db->close();
?>
