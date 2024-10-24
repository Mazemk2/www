const express = require('express');
const path = require('path');
const cookieParser = require('cookie-parser');

const lyricsRoutes = require('./lyrics.js');

const app = express();

// Middleware
app.use(express.urlencoded({ extended: true }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

// Setze EJS als Template-Engine
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

// Hauptseite
app.get('/', (req, res) => {
    res.render('index', { title: 'Willkommen' });
});

// Routen für Lyrics
app.use('/lyrics', lyricsRoutes);

// Server starten
app.listen(3000, () => {
    console.log('Server läuft auf http://localhost:3000');
});
