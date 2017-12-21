/* global $ */
(function () {
    "use strict";

    var videoList = $("#videoList");
    var theVideo = $('#theVideo');

    function setPlaylist(video) {
        return $("<li><div class='vids card bg-secondary mb-1' style='width: 98%'>" +
            "<img class='card-img-top' src='" + video.poster + "'><div class='card-body p-1>" +
            "<p class='card-title mb-0'>" + video.title + "</p></div></div></li>").appendTo(videoList);
    }

    function setVideo(url) {
        return $('video').attr('src', url);
    }


    $.getJSON('videos.json', function (loadedVideos) {
        loadedVideos.forEach(function (element) {
            setPlaylist(element)
                .click(function () {
                    // console.log(element.url);
                    setVideo(element.url);
                    $('#clickMessage').remove();
                    theVideo.show();
                    theVideo[0].play();
                });
        });

        // $.each(loadedVideos, function (index, value) {
        //     setPlaylist(value)
        //         .click(function () {
        //             // console.log(element.url);
        //             setVideo(value.url);
        //             theVideo.show();
        //         });
        // });
    }).fail(function (xhr, statusCode, statusText) {
        console.log(xhr, statusCode, statusText);
    });
}());