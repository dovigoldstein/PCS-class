import React, { Component } from 'react';
import './App.css';
import RecipeList from './RecipeList';


class App extends Component {

  recipesArray = [
    { id: 1, name: 'sesame chicken', ingredients: ['chicken breasts', 'flour', 'sesame seeds'] },
    { id: 2, name: 'challah', ingredients: ['flour', 'water', 'eggs', 'sugar'] },
    { id: 3, name: 'brownies', ingredients: ['flour', 'cocoa', 'oil'] }
  ];

  render() {
    return (
      <div>
        <RecipeList recipes={this.recipesArray} />
      </div>
    );
  }
}

export default App;
