import React, { Component } from 'react';
import RecipeList from './RecipeList';
import AddRecipe from './AddRecipe';

export default class RecipeBook extends Component {
    constructor(props) {
        super(props);
        this.state = {
            recipes: [
                { name: 'Macaroni', instructions: 'Boil water, add macaroni', picture: 'https://utesmile.files.wordpress.com/2013/02/maccaroni-cheese1.png' },
                { name: 'Eggs', instructions: 'Boil water, add eggs', picture: 'https://a99d9b858c7df59c454c-96c6baa7fa2a34c80f17051de799bc8e.ssl.cf1.rackcdn.com/images/eggs-healthy-delicious.jpg' }
            ]
        };
    }

    addRecipe = (recipe) => {
        // let updatedRecipes = this.state.recipes.concat(recipe);
        // this.setState({ recipes: updatedRecipes });

        this.state.recipes.push(recipe);
        this.setState({ recipes: this.state.recipes });
    }

    render() {
        return (
            <div>
                Im a recipe book
                <RecipeList recipes={this.state.recipes} />
                <AddRecipe addRecipe={this.addRecipe} />
            </div>
        );
    }
}

