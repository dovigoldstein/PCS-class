const url = require('url');

module.exports = function (req, res, next) {
    req.query = url.parse(req.url, true).query;
    if (req.query.magicWord === 'please') {
        next();
    } else {
        const error = new Error('Whats the magic word?');
        error.statusCode = 403;
        next(error);
    }

};