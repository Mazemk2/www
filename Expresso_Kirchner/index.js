const express = require('express');
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const cookieParser = require('cookie-parser');
const mongoose = require('mongoose');

const { User } = require('./db.js');
const secrets = require('./secrets.js');

const app = express();

// EJS als View-Engine einrichten
app.set('view engine', 'ejs');

// Middleware für statische Inhalte
app.use(express.static('public'));

// Middleware, um URL-encoded-Daten zu verarbeiten
app.use(express.urlencoded({ extended: true }));

// Cookie-Parser-Middleware verwenden
app.use(cookieParser());

// Verbindung zur MongoDB-Datenbank herstellen
async function connectToDatabase() {
    try {
        await mongoose.connect(secrets.db_uri);
        console.log('MongoDB verbunden!');
    } catch (err) {
        console.error('Fehler bei der Verbindung zu MongoDB:', err.message);
        // Datenbank erstellen, wenn sie nicht existiert
        const dbName = secrets.db_uri.split('/').pop(); // Den Datenbanknamen aus der URI extrahieren
        mongoose.connect(`mongodb://localhost:27017/${daterr}`)
            .then(() => console.log(`Datenbank ${dbName} wurde erstellt.`))
            .catch(err => console.error('Fehler beim Erstellen der Datenbank:', err.message));
    }
}

connectToDatabase();

// Route für die Startseite
app.get('/', (req, res) => {
    const token = req.cookies['token'];
    let loggedInUser = false;

    if (token) {
        jwt.verify(token, secrets.jwt_secret_key, (err, user) => {
            if (err) {
                console.log(err);
            } else {
                loggedInUser = user;
            }
        });
    }

    res.render('index', {
        title: 'Willkommen',
        message: 'Willkommen bei Ihrem ersten Express-Server!',
        user: loggedInUser
    });
});

// Registrierung
app.get('/register', (req, res) => {
    res.render('register', { title: 'Registrierung' });
});

app.post('/register', async (req, res) => {
    const { username, name, email, password, password_check } = req.body;

    if (password !== password_check) {
        return res.status(400).render('register', {
            title: 'Registrierung',
            error: 'Die Passwörter stimmen nicht überein.',
            username, name, email
        });
    }

    const hashedPassword = await bcrypt.hash(password, 10);

    try {
        // Überprüfe, ob der Benutzername bereits existiert
        const existingUser = await User.findOne({ username });
        if (existingUser) {
            return res.status(400).render('register', {
                title: 'Registrierung',
                error: `Der Benutzername "${username}" existiert bereits.`,
                username, name, email
            });
        }

        // Überprüfe, ob die E-Mail bereits verwendet wird
        const existingEmail = await User.findOne({ email });
        if (existingEmail) {
            return res.status(400).render('register', {
                title: 'Registrierung',
                error: `Die E-Mail "${email}" wird bereits verwendet.`,
                username, name, email
            });
        }

        const newUser = new User({
            username,
            name,
            email,
            password_hash: hashedPassword
        });
        await newUser.save();
        
        return res.status(201).render('index', {
            title: 'Erfolgreich registriert',
            success: `Sie haben sich erfolgreich registriert.`
        });
    } catch (err) {
        console.error(err);
        return res.status(500).render('register', {
            title: 'Registrierung',
            error: 'Fehler bei der Registrierung',
            username, name, email
        });
    }
});

// Login
app.get('/login', (req, res) => {
    res.render('login', { title: 'Login' });
});

app.post('/login', async (req, res) => {
    const { username, password } = req.body;

    let user;
    try {
        user = await User.findOne({ username });
    } catch (err) {
        console.error(err);
        return res.status(500).render('login', { title: 'Login', error: 'Fehler beim Login' });
    }

    if (!user) {
        return res.status(404).render('login', { title: 'Login', error: 'Benutzer nicht gefunden.' });
    }

    const isMatch = await bcrypt.compare(password, user.password_hash);
    if (!isMatch) {
        return res.status(403).render('login', { title: 'Login', error: 'Falsches Passwort' });
    }

    const token = jwt.sign(
        { username: user.username, name: user.name, email: user.email },
        secrets.jwt_secret_key,
        { expiresIn: '1h' }
    );

    res.cookie('token', token, { httpOnly: true }).redirect('/');
});

// Logout
app.post('/logout', (req, res) => {
    res.clearCookie('token').redirect('/');
});

// Server starten
app.listen(3000, () => {
    console.log('Server läuft auf http://localhost:3000');
});
