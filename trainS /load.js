const http = require('http');
 
const server = http.createServer((req, res) => {
        console.log(req);
        res.statusCode = 418;
        res.setHeader('Content-Type', 'text/plain');
        res.end('Hello Bowser');
});
 
server.listen(3000, () => {
    console.log('Server running at http://localhost:3000/');
});