(function () {
    "use strict";

    var canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d'),
        snakeImg = document.createElement('img'),
        appleImg = document.createElement('img'),
        segmentSize = 64,
        lat = segmentSize * 8,
        lng = segmentSize * 4,
        prevLat = lat,
        prevLng = lng,
        goingHorizontal = true,
        direction = 'right',
        gameInterval = null;

    canvas.width = segmentSize * 17;
    canvas.height = segmentSize * 10;

    snakeImg.src = "images/snake-" + direction + ".png";
    appleImg.src = "images/snake-apple.png";

    snakeImg.onload = function () {
        context.drawImage(snakeImg, lat, lng, segmentSize, segmentSize);
    };

    appleImg.onload = function () {
        placeApple();
    };

    window.addEventListener('keydown', function (event) {
        if (goingHorizontal) {
            if (event.keyCode === 38)/* up */ {
                goingHorizontal = false;
                direction = 'up';
            } else if (event.keyCode === 40)/* down*/ {
                goingHorizontal = false;
                direction = 'down';
            }
        } else {
            if (event.keyCode === 39)/*right*/ {
                goingHorizontal = true;
                direction = 'right';
            } else if (event.keyCode === 37)/*left*/ {
                goingHorizontal = true;
                direction = 'left';
            }
        }
    });

    if (!gameInterval) {
        gameInterval = setInterval(function () {
            prevLat = lat;
            prevLng = lng;
            switch (direction) {
                case 'up':
                    lng -= segmentSize;
                    break;
                case 'down':
                    lng += segmentSize;
                    break;
                case 'left':
                    lat -= segmentSize;
                    break;
                case 'right':
                    lat += segmentSize;
                    break;
            }
            if (lat > canvas.width - segmentSize || lat < 0 ||
                lng > canvas.height - segmentSize || lng < 0) {
                clearInterval(gameInterval);
                gameInterval = null;
            } else {
                context.clearRect(prevLat, prevLng, segmentSize, segmentSize);
                snakeImg.src = "images/snake-" + direction + ".png";
                context.drawImage(snakeImg, lat, lng, segmentSize, segmentSize);
            }
        }, 400);
    }

    function placeApple() {
        var appleX = Math.round(getRandomNumberBetween(0, canvas.width - segmentSize) / segmentSize) * segmentSize;
        var appleY = Math.round(getRandomNumberBetween(0, canvas.height - segmentSize) / segmentSize) * segmentSize;
        context.drawImage(appleImg, appleX, appleY, segmentSize, segmentSize);
    }

    function getRandomNumberBetween(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }


}());