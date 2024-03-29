<?php
include("./admin_nav.php");

// Database connection
$db = new mysqli("localhost", "root", "", "recipe");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if the form is submitted to add a new recipe
if(isset($_POST['add_recipe'])) {
    $recipe_name = $_POST['recipe_name'];
    $recipe_description = $_POST['recipe_description'];
    
    $target_dir = "uploads/";
    $image_name = basename($_FILES["recipe_image"]["name"]);
    $image_path = $target_dir . $image_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["recipe_image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if file size
    if ($_FILES["recipe_image"]["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    } else {
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }

        if (!is_writable('uploads')) {
            exit;
        }

        // Generate a unique name for the image
        $image_unique_name = uniqid() . '_' . $image_name;

        if (move_uploaded_file($_FILES["recipe_image"]["tmp_name"], $target_dir . $image_unique_name)) {
            $query_check = "SELECT * FROM featured_recipes WHERE image='$image_unique_name'";
            $result_check = $db->query($query_check);

            if($result_check->num_rows > 0) {
            } else {
                $query = "INSERT INTO featured_recipes (recipe_name, description, image) VALUES ('$recipe_name', '$recipe_description', '$image_unique_name')";
                $result = $db->query($query);
                header("Location: recipes.php");  // Redirect to prevent form resubmission
            }
        }
    }
}

// Delete Recipe
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM featured_recipes WHERE id = $delete_id";
    if($db->query($delete_query)) {
        header("Location: recipes.php");  // Redirect after deleting to refresh the page
    } else {
    }
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./css/recipes.css">
    <style>
        .delete-button {
            background-color: #ff6347;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 10px;
        }

        .delete-button:hover {
            background-color: #d9534f;
        }
    </style>
</head>

<body>
    <section class="content">
        <div class="admin-container">
            <h2>Manage Featured Recipes</h2>

            <!-- Add Recipe Form -->
            <div class="add-recipe">
                <h3>Add New Recipe for Featured Section</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="recipe_name">Recipe Name:</label>
                    <input type="text" name="recipe_name" required>
                    
                    <label for="recipe_description">Recipe Description:</label>
                    <textarea name="recipe_description" rows="4" required></textarea>

                    <label for="recipe_image">Recipe Image:</label>
                    <input type="file" name="recipe_image" required>

                    <input type="submit" name="add_recipe" value="Add Recipe">
                </form>
            </div>

            <!-- Existing Recipes -->
            <div class="existing-recipes">
                <h3>Existing Featured Recipes</h3>
                <div class="recipe-box">
                    <?php 
                    if($recipes_result->num_rows > 0) {
                        while($row = $recipes_result->fetch_assoc()) {
                            echo '<div class="card">';
                            echo '<img src="uploads/' . $row['image'] . '" alt="' . $row['recipe_name'] . '">';
                            echo '<div class="content">';
                            echo '<h3>' . $row['recipe_name'] . '</h3>';
                            echo '<p>' . $row['description'] . '</p>';
                            echo '<a href="?delete_id=' . $row['id'] . '" class="delete-button">Delete Recipe</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No featured recipes found.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
