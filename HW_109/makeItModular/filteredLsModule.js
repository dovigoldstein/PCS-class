const fs = require('fs');

module.exports = (directory, extension, callback) => {
    fs.readdir(directory, 'utf8', (err, files) => {
        if (err) {
            return callback(err);
        } else {
            const filteredFiles = files.filter(fileName => fileName.endsWith(`.${extension}`));
            return callback(null, filteredFiles);
        }
    });
}

