<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['Username'])) {
    // Redirect to the sign-in page if not logged in
    header("Location: signin.html");
    exit(); 
}

// Retrieve user information from the session
$username = $_SESSION['Username'];
$email = $_SESSION['Email']; // Assuming Email is stored in the session as well

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wc-text {
            position: absolute; 
            top: 8px;
            left: 20px;
            text-align: left;
            color: #212529;
            text-shadow: #212529 0 0 2.5px;
            font-family: Papyrus, fantasy;        
        }


        .container {
            max-width: 490px;
            padding: 27px 36px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .container svg {
            width: 70px;
            height: 70px;
            margin: 5px 90px 20px 90px;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info label {
            font-weight: bold;
        }

        .logout-btn {
            background-color: #ff6347;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-left: 30%;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #d63e21;
        }
    </style>
</head>

<body>
    <div class="wc-text">
        <h1>Welcome, <?php echo $username; ?> &#x1F499;!</h1>
    </div>
    <div class="container">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" id="profile">
            <circle cx="12" cy="12" r="11" fill="#000" opacity=".4"></circle>
            <path fill="#000" fill-rule="evenodd"
                d="M12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11ZM10 13C8.34315 13 7 14.3431 7 16C7 17.6569 8.34315 19 10 19H14C15.6569 19 17 17.6569 17 16C17 14.3431 15.6569 13 14 13H10Z"
                clip-rule="evenodd"></path>
        </svg>
        <div class="profile-info">
            <label for="name">Name:</label>
            <span id="name">
                <?php echo $username; ?>
            </span>
        </div>
        <div class="profile-info">
            <label for="email">Email:</label>
            <span id="email">
                <?php echo $email; ?>
            </span>
        </div>
        <button class="logout-btn" onclick="logout()">Logout</button>
    </div>

    <script>
        function logout() {
            // Perform logout action here, such as redirecting to logout page or clearing session/local storage
            alert("Logout successful!");
            window.location.href = "signin.html";
        }
    </script>
</body>

</html>