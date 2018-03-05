import React, { Component } from 'react';
import { Switch, Route, Redirect, Link } from 'react-router-dom';
import RecipeList from './RecipeList';
import AddRecipe from './AddRecipe';
// import Recipe from './Recipe';

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
        let updatedRecipes = this.state.recipes.concat(recipe);
        this.setState({ recipes: updatedRecipes });
    }

    routes = (
        <Switch>
            <Route path="/Recipes" render={() => <RecipeList recipes={this.state.recipes} />} />
            {/* <Route path="/Recipe/:recipeId" component={Recipe} /> */}
            <Route path="/AddRecipe" render={() => <AddRecipe addRecipe={this.addRecipe} />} />
            <Redirect exact from="/" to="/Recipes" />
            <Route render={() => <div>404</div>} />
        </Switch>
    );

    render() {
        return (
            <div>
                <h1>Im a recipe book</h1>
                <Link to="/Recipes">Recipes</Link> | <Link to="/AddRecipe">Add Recipe</Link>
                <hr />
                {/* <RecipeList recipes={this.state.recipes} />
                <AddRecipe addRecipe={this.addRecipe} /> */}
                {this.routes}
            </div>
        );
    }
}

