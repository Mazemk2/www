const http = require('http');
const fs = require('fs');
const path = require('path');

const port = 8000;

const server = http.createServer((req, res) => {
    // Datei-Pfad zur index.html ermitteln
    const filePath = path.join(__dirname, 'index.html');

    // HTML-Datei lesen und senden
    fs.readFile(filePath, (err, content) => {
        if (err) {
            res.writeHead(500, { 'Content-Type': 'text/plain' });
            res.end('Error loading the page');
        } else {
            // Content-Type auf text/html setzen
            res.writeHead(200, { 'Content-Type': 'text/html; charset=utf-8' });
            res.end(content, 'utf-8');
        }
    });
});

server.listen(port, () => {
    console.log(`Server läuft auf http://localhost:${port}`);
});