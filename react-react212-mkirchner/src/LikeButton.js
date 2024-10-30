// src/LikeButton.js
import React, { useContext } from 'react';
import { ClickContext } from './ClickContext';

function LikeButton() {
  // Zugriff auf den globalen Like-Zähler und die Erhöhungsfunktion
  const { likeCount, incrementLikeCount } = useContext(ClickContext);

  return (
    <div>
      <button onClick={incrementLikeCount}>Like {likeCount}mm</button>
      <p><h6> Likes: {likeCount}</h6></p>
    </div>
  );
}

export default LikeButton;
