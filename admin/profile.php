<?php 
include("admin_nav.php");
session_start();

// Check if the user is an admin
if(!isset($_SESSION['Username'])) {
    header("Location: ../signin.html");
    exit();
}

$username = $_SESSION['Username'];

// Establish connection to the recipe database
$db = new mysqli("localhost", "root", "", "recipe");

if ($db->connect_error) {
    die ("Connection failed: " . $db->connect_error);
}

$query = "SELECT username, email FROM admin WHERE username = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $admin_name = htmlspecialchars($row['username']);
    $admin_email = htmlspecialchars($row['email']);
} else {
    echo '<script>alert("Admin details not found");';
    echo 'window.location.href = "../signin.html";</script>';
    exit();
}

$stmt->close();
$db->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="./css/profile.css">
</head>

<body>
    <section class="content">
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
                    <?php echo $admin_name; ?>
                </span>
            </div>
            <div class="profile-info">
                <label for="email">Email:</label>
                <span id="email">
                    <?php echo $admin_email; ?>
                </span>
            </div>
            <form action="admin_logout.php" method="post" onsubmit="return confirm('Are you sure you want to logout?');">
                <input type="submit" value="Logout" class="logout-btn">
            </form>
        </div>
    </section>
</body>

</html>
