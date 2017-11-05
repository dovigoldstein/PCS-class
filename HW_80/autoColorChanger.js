(function () {
    "use strict";
    function rgbGenreator() {
        var rgb = 'rgb(';
        var rgbArray = [];
        for (var x = 0; x < 3; x++) {
            rgbArray.push(Math.floor(Math.random() * 256));
        }
        rgb += rgbArray.join(',') + ')';
        return rgb;
    }

    function changeColors() {
        document.body.style.backgroundColor = rgbGenreator();
        document.body.style.color = rgbGenreator();
    }

    var startString = 'Change Colors';
    var stopString = 'Stop';
    var intervalId;
    var theColorButton = document.getElementById("colorButton");
    theColorButton.innerHTML = startString;
    theColorButton.addEventListener('click', function () {
        if (theColorButton.innerHTML === startString) {
            intervalId = setInterval(changeColors, 1000);
            theColorButton.innerHTML = stopString;
        } else {
            clearInterval(intervalId);
            theColorButton.innerHTML = startString;
        }
    });
}());