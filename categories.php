<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&family=Indie+Flower&display=swap');
        @import url("https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap");

        * {
            box-sizing: border-box;
            font-family: "Josefin Sans", sans-serif;
        }

        .categories {
            width: 100%;
            padding: 100px 0px;
            background-color: #e4ecefb7;
        }

        .categories h2 {
            color: #383838;
            font-size: 50px;
            text-transform: capitalize;
            margin-top: 0px;
            margin-bottom: 20px;
            text-align: center;
            font-family: "Akaya Kanadaka", system-ui;
        }

        .box {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .ca-card {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 10px;
            border: 5px solid #ccc;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .box .ca-card .content {
            position: absolute;
            bottom: 0px;
            left: 0px;
            right: 0px;
            padding: 15px;
            background-color: #edffef;
            color: #182f32;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .box .ca-card:hover .content {
            opacity: 1;
        }

        .ca-card h3 {
            font-size: 20px;
            margin-top: 0;
            margin-bottom: 10px;
            color: #213032;
        }

        .box .ca-card p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .box .ca-card button {
            position: relative;
            background-color: #213032;
            color: #fff;
            text-decoration: none;
            border: 2px solid black;
            font-weight: bold;
            transform: .4s;
            padding: 10px 15px;
        }

        .box .ca-card button:hover {
            background-color: #97a2a3;
            color: #213032;
            border: 2px solid black;
            cursor: pointer;
        }

        .box .ca-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
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
                <img src="./imgs/main-courses.jpg" alt="">
                <div class="content">
                    <h3>Main Courses</h3>
                    <p>Hearty and fulfilling dishes to satiate your hunger and cravings.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="./imgs/desserts.jpg" alt="">
                <div class="content">
                    <h3>Desserts</h3>
                    <p>Sweet treats to satisfy your cravings, perfect for any occasion.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="./imgs/healthyeats.jfif" alt="">
                <div class="content">
                    <h3>Healthy Eats</h3>
                    <p>Nutritious and delicious dishes to fuel your body and soul.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="./imgs/baking.jfif" alt="">
                <div class="content">
                    <h3>Baking</h3>
                    <p>Oven-fresh delights that bring warmth and joy to your table.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="./imgs/veg.jpg" alt="">
                <div class="content">
                    <h3>Veg</h3>
                    <p>Wholesome vegetarian dishes bursting with flavors and goodness.</p>
                    <button onclick="redirectToRecipes()">Read More</button>
                </div>
            </div>
            <div class="ca-card">
                <img src="./imgs/nonveg.jpg" alt="">
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
