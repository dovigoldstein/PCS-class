const http = require('http'),
    url = process.argv[2];

http.get(url, (response) => {

    let numChars = 0;

    let dataString = '';

    response.setEncoding('utf8');

    response.on('data', data => {

        numChars += data.length;

        dataString += data;
    });


    response.on('end', () => {
        console.log(numChars);
        console.log(dataString);
    });
}).on('error', () => {
    console.error('ERROR');
});