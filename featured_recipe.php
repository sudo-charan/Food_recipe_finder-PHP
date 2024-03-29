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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&family=Indie+Flower&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .recipe {
            width: 100%;
            padding: 50px 0;
            background-color: #f5f5f5;
        }

        .recipe h2 {
            color: #383838;
            font-size: 40px;
            text-transform: capitalize;
            margin-bottom: 20px;
            text-align: center;
            font-family: "Akaya Kanadaka", system-ui;
        }

        .box {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            width: 300px;
            height: 400px;
            margin: 10px;
            border: 1px solid #9e8961;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            background-color: #edf2f4;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card .content {
            height: 150px;
            padding: 15px;
            background-color: #edf2f4;
            color: black;
            text-align: left;
            overflow-y: auto; /* to scroll bar */
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #213032;
        }

        .card p {
            font-size: 14px;
            margin-bottom: 10px;
        }

    </style>
</head>

<body>
    <div class="recipe" id="featured_recipe">
        <h2>Featured Recipes</h2>
        <div class="box">
            <?php 
            if($recipes_result->num_rows > 0) {
                while($row = $recipes_result->fetch_assoc()) {
                    $image_path = './admin/uploads/' . $row['image'];
                    
                    echo '<div class="card">';
                    echo '<img src="' . $image_path . '" alt="' . $row['recipe_name'] . '">';
                    echo '<div class="content">';
                    echo '<h3>' . $row['recipe_name'] . '</h3>';
                    echo '<p>' . $row['description'] . '</p>';
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
