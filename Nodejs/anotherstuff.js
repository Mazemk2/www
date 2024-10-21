const fs = require('fs');
 
// Asynchrones Lesen einer Datei
fs.readFile('example.txt', 'utf8', (err, data) => {
    if (err) {
        console.error('Error reading file:', err);
        return;
    }
    console.log('File content:', data);
});
 
console.log('\nThis will be printed before the file content\n\n');