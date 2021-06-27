const button = document.getElementById('button-cocktail');
const title = document.getElementById('title');
const instructions = document.getElementById('instruction');

button.addEventListener('click', (e)=> {
    e.preventDefault();
    const url = 'https://www.thecocktaildb.com/api/json/v1/1/random.php';
    fetch(url)
        .then(function(response){
            return response.json();
        })
        .then(function(cocktail){
            title.innerHTML = cocktail.drinks[0].strDrink;
            instructions.innerHTML = cocktail.drinks[0].strInstructions;
        })
});

