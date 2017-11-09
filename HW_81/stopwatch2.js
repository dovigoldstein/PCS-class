(function () {
    'use strict';

    function createElement(type) {
        return document.createElement(type);
    }
    var startString = 'Start';
    var stopString = 'Stop';
    var restartString = 'Restart';
    var theInterval;
    var savedTime;
    var elapsedTime;


    var clockDiv = createElement("div");
    var numbersDiv = createElement("div");
    var buttonsDiv = createElement("div");
    var hoursDiv = createElement("div");
    var minutesDiv = createElement("div");
    var secondsDiv = createElement("div");
    var tenMilisDiv = createElement("div");
    var colon1Div = createElement("div");
    var colon2Div = createElement("div");
    var colon3Div = createElement("div");
    var startStopButton = createElement("button");
    var resetButton = createElement("button");

    document.body.appendChild(clockDiv);
    clockDiv.appendChild(numbersDiv);
    clockDiv.appendChild(buttonsDiv);

    hoursDiv.innerHTML = '00';
    colon1Div.innerHTML = ':';
    minutesDiv.innerHTML = '00';
    colon2Div.innerHTML = ':';
    secondsDiv.innerHTML = '00';
    colon3Div.innerHTML = ':';
    tenMilisDiv.innerHTML = '00';

    numbersDiv.appendChild(hoursDiv);
    numbersDiv.appendChild(colon1Div);
    numbersDiv.appendChild(minutesDiv);
    numbersDiv.appendChild(colon2Div);
    numbersDiv.appendChild(secondsDiv);
    numbersDiv.appendChild(colon3Div);
    numbersDiv.appendChild(tenMilisDiv);

    startStopButton.innerHTML = startString;
    resetButton.innerHTML = 'Reset';

    buttonsDiv.appendChild(startStopButton);
    buttonsDiv.appendChild(resetButton);

    document.body.style.backgroundColor = 'rgb(9, 1, 22)';
    startStopButton.style.borderRadius = '2px';
    startStopButton.style.color = 'rgb(255,255,255)';
    startStopButton.style.height = '50px';
    startStopButton.style.width = '132px';
    startStopButton.style.fontSize = '31px';
    startStopButton.style.border = 'none';
    startStopButton.style.borderRadius = '4px';

    resetButton.style.borderRadius = '2px';
    resetButton.style.color = 'rgb(255,255,255)';
    resetButton.style.height = '50px';
    resetButton.style.width = '132px';
    resetButton.style.fontSize = '31px';
    resetButton.style.border = 'none';
    resetButton.style.borderRadius = '4px';
    resetButton.style.marginLeft = '25px';

    resetButton.style.backgroundColor = 'rgb(253, 228, 2)';
    hoursDiv.style.width = '114px';
    minutesDiv.style.width = '114px';
    secondsDiv.style.width = '114px';
    tenMilisDiv.style.width = '114px';
    clockDiv.style.position = 'absolute';
    clockDiv.style.top = '50%';
    clockDiv.style.left = '50%';
    clockDiv.style.height = '500px';
    clockDiv.style.width = '800px';
    clockDiv.style.boxSizing = 'border-box';
    clockDiv.style.marginTop = '-250px';
    clockDiv.style.marginLeft = '-400px';
    clockDiv.style.fontSize = '100px';
    clockDiv.style.backgroundColor = 'rgb(70, 60, 60)';
    clockDiv.style.color = 'rgb(250, 250, 250)';
    clockDiv.style.textAlign = 'center';
    clockDiv.style.paddingTop = '125px';
    numbersDiv.style.display = 'inline-flex';

    startStopButton.style.backgroundColor = 'rgb(12, 128, 17)';

    startStopButton.addEventListener('click', function () {
        if (theInterval) {
            savedTime = elapsedTime;
            clearInterval(theInterval);
            theInterval = 0;
            startStopButton.innerHTML = restartString;
            startStopButton.style.backgroundColor = 'rgb(12, 128, 17)';
        } else {
            var startTime = new Date();
            theInterval = setInterval(function () {
                var now = new Date().getTime();
                if (savedTime) {
                    now += savedTime.getTime();
                }
                elapsedTime = new Date(now - startTime);

                var hoursDisplay = elapsedTime.getHours() - 19;
                var minutesDisplay = elapsedTime.getMinutes();
                var secondsDisplay = elapsedTime.getSeconds();
                var tenMilisDisplay = Math.floor(elapsedTime.getMilliseconds() / 10);

                hoursDiv.innerHTML = hoursDisplay > 9 ? hoursDisplay : '0' + hoursDisplay;
                minutesDiv.innerHTML = minutesDisplay > 9 ? minutesDisplay : '0' + minutesDisplay;
                secondsDiv.innerHTML = secondsDisplay > 9 ? secondsDisplay : '0' + secondsDisplay;
                tenMilisDiv.innerHTML = tenMilisDisplay > 9 ? tenMilisDisplay : '0' + tenMilisDisplay;
            }, 10);
            startStopButton.innerHTML = stopString;
            startStopButton.style.backgroundColor = 'rgb(255,34,34)';
        }
    });
    resetButton.addEventListener('click', function () {
        hoursDiv.innerHTML = '00';
        minutesDiv.innerHTML = '00';
        secondsDiv.innerHTML = '00';
        tenMilisDiv.innerHTML = '00';
        clearInterval(theInterval);
        theInterval = 0;
        savedTime = 0;
        startStopButton.innerHTML = startString;
        startStopButton.style.backgroundColor = 'rgb(12, 128, 17)';
    });


}());