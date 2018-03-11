const http = require('http'),
    url = process.argv[2],
    bl = require('bl');

http.get(url, (response) => {

    response.pipe(bl((err, data) => {
        if (err) {
            return console.error(err.message);
        }

        console.log(data.length);
        console.log(data.toString());
    }));
});

