import React from 'react';

const SelectedRecipe = (props) => {
    const selectedRecipeName = props.recipe ? <h4>{props.recipe.name}</h4> : '';
    // const { name, ingredients } = props.recipe;
    const ingredientElements = props.recipe.ingredients ? props.recipe.ingredients.map((ingredient, i) => <li key={i}>{ingredient}</li>) : '';

    return (
        <div>
            <h4>Selected Recipe</h4>
            {selectedRecipeName}
            <ul>{ingredientElements}</ul>
        </div>
    );
}

export default SelectedRecipe;