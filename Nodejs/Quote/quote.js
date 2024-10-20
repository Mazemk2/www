const http = require('http');
const fs = require('fs');

// Create an HTTP server
const server = http.createServer((req, res) => {
    // Set the response header
    res.writeHead(200, { 'Content-Type': 'text/plain; charset=utf-8' });

    // Read quotes from the JSON file
    fs.readFile('quotes.json', 'utf8', (err, data) => {
        if (err) {
            res.end('Fehler beim Laden der Zitate.');
            return;
        }

        const quotes = JSON.parse(data);

        // Randomly select a quote
        const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];

        // Send the random quote as a response
        res.end(randomQuote);
    });
});

// Server listens on port 3000
server.listen(3000, () => {
    console.log('Server running at http://localhost:3000/');
});
