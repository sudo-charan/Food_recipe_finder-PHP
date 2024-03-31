<?php include("header.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Search</title>
    <!-- Google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- Style  CSS -->
    <link rel="stylesheet" href="./css/recipes.css">
</head>

<body>
    <div class="container">
        <div class="background-img">
            <div class="content">
                <h1>Recipes That Speak Deliciousness!</h1>
                <div class="search-box">
                    <input type="search" name="search" id="search" placeholder="Search Food Recipe..." />
                    <i class="material-symbols-outlined" id="searchIcon">search</i>
                </div>
            </div>
        </div>
    </div>
    <div class="recipe-container" id="recipeContainer">
        <!-- Recipe cards will be dynamically added here -->
        <!-- <div class="recipe-container" id="recipeContainer">
    <div class="recipe-container">
        <div class="recipe-card">
            <h2 class="recipe-title">Spaghetti Bolognese</h2>
            <img src="./imgs/Spaghetti Bolognese.jpeg" alt="Spaghetti Bolognese" class="recipe-image">
            <p class="recipe-description">A classic Italian pasta dish with a rich meat sauce.</p>
            <a href="spaghetti_recipe.html" class="recipe-link">View Recipe</a>
        </div>
    </div> -->
    </div>

    <!-- Recipe modal -->
    <div id="recipeModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="recipeDetails"></div>
        </div>
    </div>

    <!-- JavaScript section -->
    <script src="./js/recipes.js"></script>
    <!-- JavaScript section end -->
</body>

</html>
