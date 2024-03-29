<?php
ob_start();  // Start output buffering

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$db = new mysqli("localhost", "root", "", "recipe");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if(isset($_POST['g-name']) && isset($_POST['g-email']) && isset($_POST['g-msg'])) {
    $name = $_POST['g-name'];
    $email = $_POST['g-email'];
    $message = $_POST['g-msg'];

    // Prepare the SQL statement
    $stmt = $db->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the statement
    if($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
    
    $stmt->close();  // Close the prepared statement
    $db->close();    // Close the database connection

    ob_end_flush();  // Flush the output buffer
    exit(); // Stop further execution of the script after handling the form submission
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="./css/footer.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <footer>
        <div class="f-item-con">
            <div class="app-info">
                <span class='app-name'>
                    <span class='app-initial'>Recipe</span> Saga
                </span>
            </div>
            <div class="useful-links">
                <div class="footer-title">Useful Links</div>
                <ul>
                    <li>Home </li>
                    <li>Categories</li>
                    <li>Featured Recipes</li>
                    <li>Recipes</li>
                    <li>About Us</li>
                </ul>
            </div>
            <div class="g-i-t">
                <div class="footer-title">Get in Touch</div>
                <form id="contactForm" class="space-y-2">
                    <input type="text" name="g-name" class="g-inp" id="g-name" placeholder='Name' required />
                    <input type="email" name="g-email" class="g-inp" id="g-email" placeholder='Email' required />
                    <textarea name="g-msg" class="g-inp h-40 resize-none" id="g-msg" placeholder='Message...' required></textarea>
                    <button type="button" id="submitBtn" class='f-btn'>Submit</button>
                </form>
            </div>
        </div>
        <div class='cr-con'>Copyright &copy; 2024 | Made by Raj | Shattu | Charan</div>
    </footer>

    <script>
        $(document).ready(function() {
            $("#submitBtn").click(function() {
                const name = $("#g-name").val();
                const email = $("#g-email").val();
                const msg = $("#g-msg").val();

                // Validate form fields
                if (name === "" || email === "" || msg === "") {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please fill all fields.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                $.ajax({
                    url: "footer.php",
                    type: "POST",
                    data: {
                        "g-name": name,
                        "g-email": email,
                        "g-msg": msg
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Message sent successfully!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to send message. Please try again.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred. Please try again later.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>

