<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="./css/categories.css">
    <script>
        function redirectToRecipes() {
            window.location.href = 'recipes.php';
        }
    </script>
</head>

<body>
    <div class="categories" id="categories">
        <h2>categories</h2>
        <div class="box">
            <div class="ca-card">
                <img src="./imgs/main-courses.jpg" alt="main-course image">
                <div class="content">
                    <h3>Main Courses</h3>
                    <p>Hearty and fulfilling dishes to satiate your hunger and cravings.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="./imgs/desserts.jpg" alt="desserts image">
                <div class="content">
                    <h3>Desserts</h3>
                    <p>Sweet treats to satisfy your cravings, perfect for any occasion.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="./imgs/healthyeats.jfif" alt="healthy eat image">
                <div class="content">
                    <h3>Healthy Eats</h3>
                    <p>Nutritious and delicious dishes to fuel your body and soul.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="./imgs/baking.jfif" alt="Baking image">
                <div class="content">
                    <h3>Baking</h3>
                    <p>Oven-fresh delights that bring warmth and joy to your table.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="./imgs/veg.jpg" alt="Veg image">
                <div class="content">
                    <h3>Veg</h3>
                    <p>Wholesome vegetarian dishes bursting with flavors and goodness.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="./imgs/nonveg.jpg" alt="Nonveg image">
                <div class="content">
                    <h3>Nonveg</h3>
                    <p>Savory meaty dishes crafted for meat lovers' ultimate satisfaction.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
