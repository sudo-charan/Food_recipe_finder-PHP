<?php
    // Start the session
    session_start();

    // Check if the user is not logged in
    if (!isset($_SESSION['Username'])) {
        // Redirect to the sign-in page
        header("Location: signin.html");
        exit();
    }

    // Include the header
    include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online food recipe finder</title>
</head>
<body>
    
<?php 
    // Include various sections of the webpage
    include("home.php");
    include("categories.php");
    include("featured_recipe.php");
    include("about.php");
?>

<?php 
    // Include the footer
    include("footer.php"); 
?>
</body>
</html>
