// Function to handle search
function handleSearch() {
    var searchTerm = document.getElementById("search").value.trim();
    
    if (searchTerm === "") {
        alert("Please enter a search term.");
        return;
    }

    var apiUrl = "https://www.themealdb.com/api/json/v1/1/search.php?s=" + searchTerm;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.meals) {
                displayRecipes(data.meals);
            } else {
                alert("No recipes found for the search term: " + searchTerm);
            }
        })
        .catch(error => {
            console.error("Error fetching recipes:", error);
            alert("An error occurred while fetching recipes. Please try again later.");
        });
}

// Function to display recipes
function displayRecipes(recipes) {
    var recipeContainer = document.getElementById("recipeContainer");
    recipeContainer.innerHTML = "";

    recipes.forEach(recipe => {
        var recipeCard = document.createElement("div");
        recipeCard.className = "recipe-card";

        var recipeTitle = document.createElement("h2");
        recipeTitle.className = "recipe-title";
        recipeTitle.textContent = recipe.strMeal;

        var recipeImage = document.createElement("img");
        recipeImage.className = "recipe-image";
        recipeImage.src = recipe.strMealThumb;
        recipeImage.alt = recipe.strMeal;

        var recipeDescription = document.createElement("p");
        recipeDescription.className = "recipe-description";
        recipeDescription.textContent = recipe.strInstructions.substring(0, 150) + "...";

        var recipeLink = document.createElement("a");
        recipeLink.className = "recipe-link";
        recipeLink.href = "javascript:void(0)";
        recipeLink.textContent = "View Recipe";

        recipeLink.addEventListener("click", function () {
            showFullRecipe(recipe.idMeal);
        });

        recipeCard.appendChild(recipeTitle);
        recipeCard.appendChild(recipeImage);
        recipeCard.appendChild(recipeDescription);
        recipeCard.appendChild(recipeLink);

        recipeContainer.appendChild(recipeCard);
    });
}

// Function to fetch full recipe details and display them in the modal
function showFullRecipe(recipeId) {
    var apiUrl = "https://www.themealdb.com/api/json/v1/1/lookup.php?i=" + recipeId;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.meals && data.meals.length > 0) {
                var recipeDetails = document.getElementById("recipeDetails");
                recipeDetails.innerHTML = "<h2>" + data.meals[0].strMeal + "</h2>" +
                    "<img src='" + data.meals[0].strMealThumb + "' alt='" + data.meals[0].strMeal + "' class='recipe-image'>" +
                    "<p>" + data.meals[0].strInstructions + "</p>";

                var modal = document.getElementById("recipeModal");
                modal.style.display = "block";

                var closeBtn = document.getElementsByClassName("close")[0];
                closeBtn.onclick = function () {
                    modal.style.display = "none";
                }
            } else {
                alert("Recipe details not found.");
            }
        })
        .catch(error => {
            console.error("Error fetching recipe details:", error);
            alert("An error occurred while fetching recipe details. Please try again later.");
        });
}

// Event listeners
document.getElementById("searchIcon").addEventListener("click", handleSearch);

document.getElementById("search").addEventListener("keypress", function (e) {
    if (e.key === 'Enter') {
        handleSearch();
    }
});
