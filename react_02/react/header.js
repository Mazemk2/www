import React from 'react';

function Header({ title = "Default title", test }) {
  return (
    <>
      <h1>Develop. Preview. Ship. - {title}</h1>
      <h2>JavaScript and more</h2>
    </>
  );
}

export default Header;
