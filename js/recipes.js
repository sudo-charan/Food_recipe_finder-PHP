// Function to handle search
function handleSearch() {
    var searchTerm = document.getElementById("search").value.trim();
    if (searchTerm === "") {
        alert("Please enter a search term.");
        return;
    }

    // Construct the API endpoint URL with the search term
    var apiUrl = "https://www.themealdb.com/api/json/v1/1/search.php?s=" + searchTerm;

    // Fetch data from the API
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
    recipeContainer.innerHTML = ""; // Clear previous recipes

    recipes.forEach(recipe => {
        var recipeCard = document.createElement("div");
        recipeCard.classList.add("recipe-card");

        var recipeTitle = document.createElement("h2");
        recipeTitle.classList.add("recipe-title");
        recipeTitle.textContent = recipe.strMeal;

        var recipeImage = document.createElement("img");
        recipeImage.classList.add("recipe-image");
        recipeImage.src = recipe.strMealThumb;
        recipeImage.alt = recipe.strMeal;

        var recipeDescription = document.createElement("p");
        recipeDescription.classList.add("recipe-description");
        recipeDescription.textContent = recipe.strInstructions.substring(0, 150) + "...";

        var recipeLink = document.createElement("a");
        recipeLink.classList.add("recipe-link");
        recipeLink.href = "javascript:void(0)"; // Use JavaScript void function to prevent page reload
        recipeLink.textContent = "View Recipe";

        // Attach click event listener to each recipe link
        recipeLink.addEventListener("click", function () {
            // Fetch full recipe details and display them in the modal
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
    // Construct the API endpoint URL with the recipe ID
    var apiUrl = "https://www.themealdb.com/api/json/v1/1/lookup.php?i=" + recipeId;

    // Fetch full recipe details from the API
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.meals && data.meals.length > 0) {
                // Fill the modal with recipe details
                var recipeDetails = document.getElementById("recipeDetails");
                recipeDetails.innerHTML = "<h2>" + data.meals[0].strMeal + "</h2>" +
                    "<img src='" + data.meals[0].strMealThumb + "' alt='" + data.meals[0].strMeal + "' class='recipe-image'>" +
                    "<p>" + data.meals[0].strInstructions + "</p>";

                // Display the modal
                var modal = document.getElementById("recipeModal");
                modal.style.display = "block";

                // Close the modal when the close button is clicked
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

// Event listener for search icon click
document.getElementById("searchIcon").addEventListener("click", function () {
    handleSearch();
});

// Event listener for enter key press in search input
document.getElementById("search").addEventListener("keypress", function (e) {
    if (e.key === 'Enter') {
        handleSearch();
    }
});
