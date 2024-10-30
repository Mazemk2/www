import React from 'react';
import logo from './logo.svg';
import './App.css';
import LikeButton from './LikeButton';
import TodoList from './TodoList';

// Erstellen einer einfachen React-Komponente in JSX
function Header() {
  return <h1>Develop. Preview. Ship.</h1>;
  }


function App() {
  return (
    
    <div className="App">
      <div Header />
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>Edit <code>src/App.js</code> and save to reload.</p>
        <LikeButton />
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
        <TodoList />
      </header>
    </div>
  );
}

export default App;

