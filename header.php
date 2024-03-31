<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online food recipe finder</title>
    <!-- Icon -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Style sheet link -->
    <link rel="stylesheet" href="./css/header.css">

</head>
<body>
    <nav>
        <div class="logo">
            <h2>Recipe Saga</h2>
        </div>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#categories">Categories</a></li>
            <li><a href="#featured_recipe">Featured  Recipes</a></li>
            <li><a href="recipes.php">Recipes</a></li>
            <li><a href="#About">About</a></li>
        </ul>

        <div class="icon">
        <i class="material-symbols-outlined" id="accountIcon">account_circle</i>
        <div class="dropdown" id="accountDropdown">
            <?php
                // Check if user is logged in
                if(isset($_SESSION['Username'])) {
                    echo '<a href="profile.php">Profile</a>'; // Profile link
                    echo '<a href="logout.php">Logout</a>'; // Logout link
                } else {
                    echo '<a href="signin.html">Login</a>'; // Login link
                    echo '<a href="signup.html">Register</a>'; // Register link
                }
            ?>
        </div>
    </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var icon = document.getElementById('accountIcon');
            var dropdown = document.getElementById('accountDropdown');

            icon.addEventListener('click', function () {
                if (dropdown.style.display === 'none' || dropdown.style.display === '') {
                    dropdown.style.display = 'block';
                } else {
                    dropdown.style.display = 'none';
                }
            });

            window.addEventListener('click', function (e) {
                if (!icon.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.style.display = 'none';
                }
            });
            
        });
    </script>
</body>
</html>
