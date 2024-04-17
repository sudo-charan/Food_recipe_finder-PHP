<?php
session_start();

// Establish connection to the database
$db = new mysqli("localhost", "root", "", "recipe");

if ($db->connect_error) {
    die ("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if login as admin checkbox is checked
    if(isset($_POST['admin-login'])) {
        // Query to fetch admin from the admin table
        $query = "SELECT * FROM admin WHERE Username = ?";
    } else {
        // Query to fetch user from the users table
        $query = "SELECT * FROM users WHERE Username = ?";
    }

    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($password === $row['Password']) { // Check password without hashing
            $_SESSION['Username'] = $username;
            $_SESSION['Email'] = $row['Email']; // Store user's email in session

            // Redirect to appropriate dashboard
            if(isset($_POST['admin-login'])) {
                header("Location: admin/admin_home.php"); // Redirect admin to admin_home.php
            } else {
                header("Location: index.html"); // Redirect regular user to index.php
            }
            exit();
        } else {
            echo '<script>alert("Invalid password");
            window.location.href = "signin.html";</script>';
        }
    } else {
        echo '<script>alert("User not found");
        window.location.href = "signin.html";</script>';
    }
    
    $stmt->close();
}
$db->close();
?>
