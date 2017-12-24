/*global $ */
(function () {
    "use strict";
    var theImage = $('#theImage');
    var theCaption = $('#theCaption');
    var prev = $('#prev');
    var next = $('#next');
    var playPause = $('#playPause');
    var playPauseImg = $('#playPause img');
    var intervalId;
    var images = [];
    var imageIndex = 0;

    function setSlide() {
        theImage.attr('src', images[imageIndex].url);
        theCaption.html(images[imageIndex].description);
    }

    function getNext() {
        imageIndex++;
        if (imageIndex >= images.length) {
            imageIndex = 0;
        }
        setSlide();
    }

    function getPrev() {
        imageIndex--;
        if (imageIndex < 0) {
            imageIndex = images.length - 1;
        }
        setSlide();
    }

    $.getJSON('images.json', function (loadedImages) {
        loadedImages.forEach(function (element) {
            images.push(element);
        });
        setSlide();
    }).fail(function (xhr, statusCode, statusText) {
        console.log(xhr, statusCode, statusText);
    });

    prev.click(getPrev);

    next.click(getNext);

    playPause.click(function () {
        if (playPauseImg.attr('src') === '../images/play.png') {
            intervalId = setInterval(getNext, 3000);
            playPauseImg.attr('src', '../images/pause.png');
        } else {
            clearInterval(intervalId);
            playPauseImg.attr('src', '../images/play.png');
        }

    });

}());