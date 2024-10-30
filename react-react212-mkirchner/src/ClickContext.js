// src/ClickContext.js
import React, { createContext, useState } from 'react';

// Erstellen des Click-Kontextes
export const ClickContext = createContext();

// ClickProvider-Komponente
export function ClickProvider({ children }) {
  // Der globale Zähler für alle Likes
  const [likeCount, setLikeCount] = useState(0);

  // Funktion zum Erhöhen des Zählers
  const incrementLikeCount = () => {
    setLikeCount((prevCount) => prevCount + 1);
  };

  return (
    <ClickContext.Provider value={{ likeCount, incrementLikeCount }}>
      {children}
    </ClickContext.Provider>
  );
}