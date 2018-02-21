import React, { Component } from 'react';
import SelectedRecipe from './SelectedRecipe';

class RecipeList extends Component {
    constructor(props) {
        super(props);
        this.state = { theSelectedRecipe: {} };
    }

    handleClick = (recipe) => {
        this.setState({ theSelectedRecipe: recipe });
    }

    render() {
        const recipeComponents = this.props.recipes.map(recipe => <li key={recipe.id} onClick={this.handleClick.bind(null, recipe)}>{recipe.name}</li>);
        return (
            <div>
                <h1>My Recipes</h1>
                <ul>
                    {recipeComponents}
                </ul>
                <SelectedRecipe recipe={this.state.theSelectedRecipe} />
            </div>
        );
    }
}

export default RecipeList;