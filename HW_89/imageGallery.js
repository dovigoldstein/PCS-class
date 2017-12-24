/*global $ */
(function () {
    "use strict";

    var myCarousel = $("#myCarousel");
    var carouselPics = $('#carouselPics');
    var playPause = $('#playPause');
    var playPauseImg = $('#playPause img');

    $.getJSON('images.json', function (loadedImages) {
        loadedImages.forEach(function (element) {
            carouselPics.append('<div class="carousel-item">' +
                '<img class="d-block w-100" src="' + element.url + '" alt="">' +
                '<div class="carousel-caption d-none d-md-block">' +
                '<h3>' + element.description + '</h3></div></div>');
        });
        $(".carousel-item:first-of-type").addClass("active");
        myCarousel.carousel('pause');
    }).fail(function (xhr, statusCode, statusText) {
        console.log(xhr, statusCode, statusText);
    });

    playPause.click(function () {
        if (playPauseImg.attr('src') === '../images/play.png') {
            myCarousel.carousel('cycle');
            playPauseImg.attr('src', '../images/pause.png');
        } else {
            myCarousel.carousel('pause');
            playPauseImg.attr('src', '../images/play.png');
        }

    });

}());
