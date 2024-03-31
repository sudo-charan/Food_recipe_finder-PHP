<?php
// Database connection
$db = new mysqli("localhost", "root", "", "recipe");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch all recipes
$recipes_query = "SELECT * FROM featured_recipes";
$recipes_result = $db->query($recipes_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Featured Recipes</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="./css/featured_recipes.css">
</head>

<body>
    <div class="recipe" id="featured_recipe">
        <h2>Featured Recipes</h2>
        <div class="box">
            <?php 
            if($recipes_result && $recipes_result->num_rows > 0) {
                while($row = $recipes_result->fetch_assoc()) {
                    $image_path = './admin/uploads/' . htmlspecialchars($row['image']);
                    $recipe_name = htmlspecialchars($row['recipe_name']);
                    $description = htmlspecialchars($row['description']);
                    
                    echo '<div class="card">';
                    echo '<img src="' . $image_path . '" alt="' . $recipe_name . '">';
                    echo '<div class="content">';
                    echo '<h3>' . $recipe_name . '</h3>';
                    echo '<p>' . $description . '</p>';
                    echo '</div>';
                    echo '</div>';                    
                }
            } else {
                echo '<p>No featured recipes found.</p>';
            }
            ?>
        </div>
    </div>
</body>

</html>
