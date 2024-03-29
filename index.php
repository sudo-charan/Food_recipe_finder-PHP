<?php
    session_start();
    if(!isset($_SESSION['Username'])) {
        header("Location: signin.html");
        exit();
    }
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
    include("home.php");
    include("categories.php");
    include("featured_recipe.php");
    include("about.php");
?>
<?php include("footer.php"); ?>
</body>
</html>
