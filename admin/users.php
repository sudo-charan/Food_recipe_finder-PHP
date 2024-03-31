<?php include("admin_nav.php"); ?>

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
            <input type="text" name="search" placeholder="Search by Username" value="<?php echo htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
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
                $query = "SELECT username, email, signup_date, signup_time FROM users WHERE username LIKE ?";
                $stmt = $db->prepare($query);
                $stmt->bind_param("s", $searchParam);
                $searchParam = '%' . $search . '%';
            } else {
                $query = "SELECT username, email, signup_date, signup_time FROM users";
                $stmt = $db->prepare($query);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["signup_date"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["signup_time"]) . "</td>";
                    echo '<td><button class="delete-btn" onclick="deleteUser(\'' . htmlspecialchars($row["username"]) . '\')">Remove</button></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found.</td></tr>";
            }
            
            $result->close();
            $stmt->close();
            $db->close();
            ?>
        </table>
    </section>

    <script>
        function deleteUser(username) {
            if (confirm('Are you sure you want to delete this user?')) {
                window.location.href = 'users.php?username=' + encodeURIComponent(username);
            }
        }
    </script>
</body>

</html>
