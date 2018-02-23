import React, { Component } from 'react';

export default class AddRecipe extends Component {
    constructor(props) {
        super(props);
        this.state = { name: "", instructions: "", picture: "" };
    }
    handleInputChange = (event) => {
        const target = event.target;
        const value = target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleClick = (e) => {
        const recipe = this.state;
        this.props.addRecipe(recipe);
        e.preventDefault();
    }

    render() {
        return (
            <form onSubmit={this.handleClick} >
                <label>
                    Name:
                    <input type="text" name="name" value={this.state.name} onChange={this.handleInputChange} />
                </label>
                <label>
                    Instructions:
                    <input type="text" name="instructions" value={this.state.instructions} onChange={this.handleInputChange} />
                </label>
                <label>
                    Image:
                    <input type="text" name="picture" value={this.state.picture} onChange={this.handleInputChange} />
                </label>
                <input type="submit" value="Submit" />
            </form >
        );
    }
}