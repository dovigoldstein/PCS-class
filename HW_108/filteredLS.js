const fs = require('fs');
fs.readdir(process.argv[2], (err, files) => {
    if (err) {
        console.error('OOPS. Invalid Path', err);
    } else {
        const filteredFiles = files.filter(fileName => fileName.endsWith(`.${process.argv[3]}`));
        filteredFiles.forEach((filteredFile) => {
            console.log(filteredFile);
        });
    }
});
