import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import Student from './Student';

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      students: [
        { name: 'Bob Dillon', grades: [99, 89, 94] },
        { name: 'Donald Trump', grades: [100, 100] },
        { name: 'Derek Jeter' }
      ]
    };


  }

  getStudents(studentsArray) {
    // console.log(studentsArray);
    const studentsItems = studentsArray.map(student =>
      <li><Student name={student.name} grades={student.grades} /></li>
    );
    // console.log(studentsItems);
    return studentsItems;
  }


  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Welcome to React</h1>
        </header>
        <ul>{this.getStudents(this.state.students)}</ul>
      </div>
    );
  }
}

export default App;
