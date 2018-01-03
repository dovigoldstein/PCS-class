/*global google, $*/
(function () {
    "use strict";

    var input = $('#input'),
        go = $('#go'),
        noResults = '<li id="noResults" class="text-center text-secondary">No results</li>',
        resultsList = $('#resultsList'),
        labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        labelIndex,
        markers = [],
        infoWindows = [],
        mapDiv = document.getElementById('map'),
        map;

    function addResult(result) {
        return $("<li><div class='result card bg-primary text-white rounded-0' style='width: 98%'>" +
            "<img class='card-img-top rounded-0' src='" + (result.thumbnailImg || "../images/noImage.png") +
            "'><div class='card-body  text-center p-1'><p class='card-title mb-0'>" +
            "<span class= 'font-weight-bold text-dark'>" + labels[labelIndex % labels.length] + '. </span>' +
            result.title + "</p></div></div></li>").appendTo(resultsList);
    }

    go.click(function () {
        setTimeout(function () { go.blur(); }, 200);
        labelIndex = 0;
        $.getJSON('http://api.geonames.org/wikipediaSearch?maxRows=10&username=dovigee&type=json&callback=?',
            { q: input.val() }, function (data) {
                if (!($.isEmptyObject(data.geonames))) {

                    // clearing old query results
                    resultsList.empty();
                    resetMarkers();

                    // reset for each query
                    var bounds = new google.maps.LatLngBounds();

                    // create li, marker, and infoWindow for each location
                    data.geonames.forEach(function (result) {

                        var lat = result.lat;
                        var lng = result.lng;
                        var location = { lat: lat, lng: lng };
                        addResult(result)
                            .click(function () {
                                panToLocation(lat, lng, 14);
                                closeinfoWindows(infoWindow);
                                infoWindow.open(map, marker);
                            });

                        // creating marker
                        var marker = new google.maps.Marker({
                            position: location,
                            label: labels[labelIndex++ % labels.length],
                            map: map,
                            title: result.title,
                            snippet: result.summary
                        });
                        markers.push(marker);

                        // creating infoWindow
                        var infoWindow = new google.maps.InfoWindow({
                            content: '<h6>' + marker.title + '</h6>' +
                                '<p>' + marker.snippet + '</p>' +
                                '<a class="nav-link p-0" target="_blank" href="http://' +
                                result.wikipediaUrl + '">Read More On Wikipedia</a>',
                            maxWidth: 200
                        });
                        infoWindows.push(infoWindow);

                        // assign infoWindow to marker
                        marker.addListener('click', function () {
                            closeinfoWindows(infoWindow);
                            infoWindow.open(map, marker);
                        });

                        // fit all markers on map
                        bounds.extend(location);
                    });
                    map.fitBounds(bounds);
                } else {
                    resetMarkers();
                    panToLocation(0, 0, 2);
                    resultsList.empty();
                    resultsList.append(noResults);
                }
            }).fail(function (xhr, statusCode, statusText) {
                console.log(xhr, statusCode, statusText);
            });
    });




    function initMap() {
        map = new google.maps.Map(mapDiv, {});
        panToLocation(0, 0, 2);
    }

    function panToLocation(lat, lng, zoom) {
        map.panTo({
            lat: lat,
            lng: lng
        });

        map.setZoom(zoom);
    }

    function resetMarkers() {
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        infoWindows.forEach(function (infoWindow) {
            infoWindow = null;
        });
        infoWindows = [];
    }

    function closeinfoWindows(infoWindow) {
        infoWindows.forEach(function (window) {
            if (window !== infoWindow) {
                window.close();
            }
        });
    }

    resultsList.append(noResults);
    initMap();
}());