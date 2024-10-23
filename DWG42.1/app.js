const express = require('express');
const path = require('path');
const app = express();

// EJS als View Engine konfigurieren
app.set('view engine', 'ejs');

// Statische Dateien bereitstellen
app.use(express.static(path.join(__dirname, 'public')));

// Routen definieren
app.get('/', (req, res) => {
    res.render('index', { title: 'Home' });
});

app.get('/about', (req, res) => {
    res.render('about', { title: 'About' });
});

app.get('/contact', (req, res) => {
    res.render('contact', { title: 'Contact' });
});

// Server starten
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`http://localhost:3000/`);
});
