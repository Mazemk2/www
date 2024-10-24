const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const app = express();

// EJS als View Engine festlegen
app.set('view engine', 'ejs');

// Middleware für POST-Daten
app.use(bodyParser.urlencoded({ extended: true }));

// Statische Dateien bereitstellen (für CSS)
app.use(express.static(path.join(__dirname, 'public')));

// Temporäre Datenbank (in-memory)
const users = [];

// Registrierungsseite
app.get('/register', (req, res) => {
    res.render('register', { error: null, success: null });
});

// Registrierung verarbeiten
app.post('/register', (req, res) => {
    const { username, email, password, confirmPassword } = req.body;

    // Fehlermeldungen vorbereiten
    let error = null;

    // Passwort-Übereinstimmung prüfen
    if (password !== confirmPassword) {
        error = 'Passwörter stimmen nicht überein.';
    }

    // Existierenden Nutzer mit gleichem Nutzernamen prüfen
    const userExists = users.find(user => user.username === username);
    if (userExists) {
        error = 'Ein Benutzer mit diesem Nutzernamen existiert bereits.';
    }

    // Existierende E-Mail prüfen
    const emailExists = users.find(user => user.email === email);
    if (emailExists) {
        error = 'Ein Benutzer mit dieser E-Mail existiert bereits.';
    }

    // Falls es einen Fehler gibt, zurück zur Registrierungsseite
    if (error) {
        return res.render('register', { error: error, success: null });
    }

    // Erfolgreiche Registrierung
    users.push({ username, email, password });
    return res.render('register', { error: null, success: 'Erfolgreich registriert!' });
});

// Server starten
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`http://localhost:3000/`);
});
