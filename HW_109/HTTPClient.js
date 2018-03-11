const http = require('http'),
    url = process.argv[2];

http.get(url, (response) => {

    response.setEncoding('utf8');

    response.on('data', data => {
        console.log(data);
    });


    // response.on('end', () => {
    //     console.log('end');
    // });
}).on('error', () => {
    console.error('ERROR');
});;