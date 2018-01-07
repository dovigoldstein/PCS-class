/*global $ */
(function () {
    'use strict';

    var dragging,
        offset,
        zIndex = 0,
        audio = $('#audio'),
        sound = $('#sound'),
        soundImage = $('#soundImage');

    $(document).on('mousedown', '.part', function (event) {
        dragging = $(this);
        offset = { y: event.offsetY, x: event.offsetX };
        dragging.css("zIndex", ++zIndex);
        dragging.addClass("dragging");
    }).on('mouseup', '.part', function () {
        var theID = dragging.attr('id');
        localStorage.setItem('parts[' + theID + '].location', JSON.stringify({ top: dragging.css('top'), left: dragging.css('left') }));
        dragging.removeClass("dragging");
        dragging = null;
    }).mousemove(function (event) {
        if (dragging) {
            dragging.css({ top: event.clientY - offset.y, left: event.clientX - offset.x });
        }
    });

    var partsArray = $(".part").toArray();
    partsArray.forEach(function (part) {
        var thePart = $(part);
        // var top = JSON.parse(localStorage.getItem('parts[' + thePart.attr('id') + '].location')) ||
        //     thePart.attr('top');
        // console.log(JSON.parse(localStorage.getItem('parts[' + thePart.attr('id') + '].location.top')));
        // var left = JSON.parse(localStorage.getItem('parts[' + thePart.attr('id') + '].location.left')) ||
        //     thePart.attr('left');
        // console.log(JSON.parse(localStorage.getItem('parts[' + thePart.attr('id') + '].location.left')));
        // var top = thePartLocation.top || thePart.attr('top');
        // var left = thePartLocation.left || thePart.attr('left');
        var top = thePart.attr('top');
        var left = thePart.attr('left');
        thePart.css('top', top);
        thePart.css('left', left);
    });

    // partsArray.forEach(function (part) {
    //     $(part).css('top', (Math.floor(Math.random() * (75 - 10)) + 9) + '%');
    //     var leftRight = Math.round(Math.random() * 0.9) * 52;
    //     var left = (Math.floor(Math.random() * ((11 + leftRight) - (2 + leftRight))) + 1 + leftRight);
    //     $(part).css('left', left + '%');
    // });

    $('#sound').click(function () {
        if (soundImage.attr('src') === '../images/sound.png') {
            audio.trigger("pause");
            soundImage.attr('src', '../images/mute.png');
            sound.css('background-color', '#f1303a');
        } else {
            audio.trigger("play");
            soundImage.attr('src', '../images/sound.png');
            sound.css('background-color', '#77f130');
        }

    });
}());