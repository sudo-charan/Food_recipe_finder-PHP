<?php 
include("admin_nav.php");

// Making connection to the database
$db = new mysqli("localhost", "root", "", "recipe");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Counting total users
$query_users = "SELECT COUNT(*) as total_users FROM users";
$result_users = $db->query($query_users);
$row_users = $result_users->fetch_assoc();
$total_users = $row_users['total_users'];

$db->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/admin_home.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <section class="content">
        <h2 class="dashboard-title">Admin Dashboard</h2>

        <div class="dashboard-overview">
            <div class="metrics">
                <div class="metric">
                    <h3>Total Recipes</h3>
                    <p>1500+</p>
                </div>
                <div class="metric">
                    <h3>Total Categories</h3>
                    <p>10</p>
                </div>
                <div class="metric">
                    <h3>Total Users</h3>
                    <p><?php echo $total_users; ?></p>
                </div>
            </div>

            <div class="actions">
                <h3>Quick Actions</h3>
                <ul>
                    <li><a href="users.php">View Users</a></li>
                    <li><a href="recipes.php">Featured Recipe</a></li>
                </ul>
            </div>
        </div>
    </section>
</body>

</html>
