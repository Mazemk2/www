import React from 'react';
import Header from './Header.js';
import MyFooter from './Footer.js';

function HomePage() {
  const names = ["Ada Lovelace", "Grace Hopper", "Margaret Hamilton"];

  return (
    <>
      <Header title="Awesome new title" test="23" />
      <Header subtitle="JS with JSX" />
      <p>This is just some Text: lorem ipsum</p>
      <ul>
        {names.map((name) => (
          <li key={name}>{name}</li>
        ))}
      </ul>
      <MyFooter />
    </>
  );
}

export default HomePage;
