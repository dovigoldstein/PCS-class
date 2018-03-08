const fs = require('fs');

fs.readFile(process.argv[2], 'utf8', (err, fileContents) => {
    if (err) {
        console.error('OOPS. Couldnt read file', err);
    } else {
        const numLines = fileContents.split('\n').length - 1;
        console.log(numLines);
    }
});