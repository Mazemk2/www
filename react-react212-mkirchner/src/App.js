// src/App.js
import React from 'react';
import logo from './logo.svg';
import './App.css';
import LikeButton from './LikeButton';
import TodoList from './TodoList';
import { ClickProvider } from './ClickContext'; // ClickProvider importieren

function Header() {
  return <h1>Develop. Preview. Ship.</h1>;
}

function App() {
  return (
    <ClickProvider>
      <div className="App">
        <Header />
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
    </ClickProvider>
  );
}

export default App;
