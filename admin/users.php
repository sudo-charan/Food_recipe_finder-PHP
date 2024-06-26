<?php include("admin_nav.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="./css/users.css">
</head>

<body>
    <section class="content">
        <h2>Users List</h2>

        <!-- Search Form -->
        <form class="search-form" action="users.php" method="GET">
            <input type="text" name="search" placeholder="Search by Username" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit">Search</button>
        </form>

        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Signup Date</th>
                <th>Signup Time</th>
                <th>Action</th>
            </tr>

            <?php
            // Establish connection to the database
            $db = new mysqli("localhost", "root", "", "recipe");

            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            // Check if a search query is provided
            $search = '';
            if(isset($_GET['search'])) {
                $search = $_GET['search'];
                $query = "SELECT username, email, signup_date, signup_time FROM users WHERE username LIKE '%$search%'";
            } else {
                $query = "SELECT username, email, signup_date, signup_time FROM users";
            }

            // Handle user deletion
            if(isset($_GET['username'])) {
                $deleteUsername = $_GET['username'];
                $deleteQuery = "DELETE FROM users WHERE username = ?";
                $stmt = $db->prepare($deleteQuery);
                $stmt->bind_param("s", $deleteUsername);
                if($stmt->execute()) {
                    echo '<script>alert("User deleted successfully");
                    window.location.href = "users.php";</script>';
                } else {
                    echo '<script>alert("Error deleting user");
                    window.location.href = "users.php";</script>';
                }
                $stmt->close();
            }

            $result = $db->query($query);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["signup_date"] . "</td>";
                    echo "<td>" . $row["signup_time"] . "</td>";
                    echo '<td><button class="delete-btn" onclick="deleteUser(\'' . $row["username"] . '\')">Remove</button></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found.</td></tr>";
            }
            
            $result->close();
            $db->close();
            ?>
        </table>
    </section>

    <script>
        function deleteUser(username) {
            if (confirm('Are you sure you want to delete this user?')) {
                window.location.href = 'users.php?username=' + username;
            }
        }
    </script>
</body>

</html>
