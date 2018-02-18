import React, { Component } from 'react';

export default class Welcome extends Component {
    getGrades(gradesArray) {
        console.log(gradesArray);
        if (gradesArray) {
            const grades = gradesArray.map(grade =>
                <li>{grade}</li>
            );

            return grades;
        } else {
            return <li>No Grades</li>;
        }
    }

    render() {
        return (
            <div>
                <h1>Student Name: {this.props.name}</h1>
                <h2>Grades</h2>
                <ul>{this.getGrades(this.props.grades)}</ul>
            </div>
        );
    }
}