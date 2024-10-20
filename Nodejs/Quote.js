// Importing the required http module
const http = require('http');

// Array of quotes
const quotes = [
    "Der einzige Weg, großartige Arbeit zu leisten, ist zu lieben, was man tut. - Steve Jobs",
    "Nicht die Jahre in unserem Leben zählen, sondern das Leben in unseren Jahren. - Abraham Lincoln",
    "Erfolg ist die Summe richtiger Entscheidungen. - Mario Adorf",
    "Lebe nicht, um zu arbeiten, arbeite, um zu leben. - Aristoteles",
    "Das Leben ist, was passiert, während du eifrig dabei bist, andere Pläne zu machen. - John Lennon"
];

// Create an HTTP server
const server = http.createServer((req, res) => {
    // Set the response header
    res.writeHead(200, { 'Content-Type': 'text/plain; charset=utf-8' });

    // Randomly select a quote
    const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];

    // Send the random quote as a response
    res.end(randomQuote);
});

// Server listens on port 3000
server.listen(3000, () => {
    console.log('Server running at http://localhost:3000/');
});