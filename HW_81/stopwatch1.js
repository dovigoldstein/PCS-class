(function () {
    'use strict';

    var hours = get('hours');
    var minutes = get('minutes');
    var seconds = get('seconds');
    var tenMilis = get('tenMilis');
    var startStop = get('startStop');
    var reset = get('reset');
    var startString = 'Start';
    var stopString = 'Stop';
    var restartString = 'Restart';
    var theInterval;
    var savedTime;
    var elapsedTime;

    function get(id) {
        return document.getElementById(id);
    }

    startStop.innerHTML = startString;
    startStop.style.backgroundColor = 'rgb(12, 128, 17)';

    startStop.addEventListener('click', function () {
        if (theInterval) {
            savedTime = elapsedTime;
            clearInterval(theInterval);
            theInterval = 0;
            startStop.innerHTML = restartString;
            startStop.style.backgroundColor = 'rgb(12, 128, 17)';
        } else {
            var startTime = new Date();
            theInterval = setInterval(function () {
                var now = new Date().getTime();
                if (savedTime) {
                    now += savedTime.getTime();
                }
                elapsedTime = new Date(now - startTime);

                var hoursString = elapsedTime.getHours() - 19;
                var minutesString = elapsedTime.getMinutes();
                var secondsString = elapsedTime.getSeconds();
                var tenMilisString = Math.floor(elapsedTime.getMilliseconds() / 10);

                hours.innerHTML = hoursString > 9 ? hoursString : '0' + hoursString;
                minutes.innerHTML = minutesString > 9 ? minutesString : '0' + minutesString;
                seconds.innerHTML = secondsString > 9 ? secondsString : '0' + secondsString;
                tenMilis.innerHTML = tenMilisString > 9 ? tenMilisString : '0' + tenMilisString;
                console.log(tenMilisString);

            }, 10);
            startStop.innerHTML = stopString;
            startStop.style.backgroundColor = 'rgb(255,34,34)';
        }
    });
    reset.addEventListener('click', function () {
        hours.innerHTML = '00';
        minutes.innerHTML = '00';
        seconds.innerHTML = '00';
        tenMilis.innerHTML = '00';
        clearInterval(theInterval);
        theInterval = 0;
        savedTime = 0;
        startStop.innerHTML = startString;
        startStop.style.backgroundColor = 'rgb(12, 128, 17)';
    });


}());