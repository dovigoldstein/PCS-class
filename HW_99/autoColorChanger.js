
// 'use strict';

// const $ = require('jQuery');

import $ from 'jquery';

// (function () {
//     "use strict";
function rgbGenerate() {
    let rgb = 'rgb(',
        rgbArray = [];
    for (var x = 0; x < 3; x++) {
        rgbArray.push(Math.floor(Math.random() * 256));
    }
    return rgb += rgbArray.join(',') + ')';
}

function changeColors() {
    $('body').css('backgroundColor', rgbGenerate());
    $('body').css('color', rgbGenerate());
}

var startString = 'Change Colors';
var stopString = 'Stop';
var intervalId;
var theColorButton = $('#colorButton');
theColorButton.html(startString);
theColorButton.click(function () {
    if (theColorButton.html() === startString) {
        intervalId = setInterval(changeColors, 3000);
        theColorButton.html(`${stopString}`);
    } else {
        clearInterval(intervalId);
        theColorButton.html(`${startString}`);
    }
});
// }());