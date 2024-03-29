<?php 
include("admin_nav.php");

// Establish connection to the database
$db = new mysqli("localhost", "root", "", "recipe");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch messages from database
$query_messages = "SELECT * FROM messages";
$result_messages = $db->query($query_messages);

// Delete message if delete button is clicked
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM messages WHERE id = $delete_id";
    if($db->query($delete_query)) {
        header("Location: messages.php"); //If success.. refresh the page to redirect messages list
    } else {
        echo "Error deleting message: " . $db->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="./css/messages.css">
</head>

<body>
    <section class="content">
        <h2>Messages</h2>
        <div class="messages-container">
            <?php 
            if($result_messages->num_rows > 0) {
                while($row = $result_messages->fetch_assoc()) {
                    echo "<div class='message-item'>";
                    echo "<strong>Name:</strong> " . $row['name'] . "<br>";
                    echo "<strong>Email:</strong> " . $row['email'] . "<br>";
                    echo "<strong>Message:</strong> " . $row['message'] . "<br>";
                    echo "<a href='messages.php?delete_id=" . $row['id'] . "' class='delete-button'>Delete</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No messages found.</p>";
            }
            ?>
        </div>
    </section>
</body>

</html>

<?php 
$db->close();
?>
