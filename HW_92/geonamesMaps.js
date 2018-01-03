/*global google, $*/
function initMap() {
    "use strict";

    var input = $('#input'),
        go = $('#go'),
        noResults = '<li id="noResults" class="text-center text-secondary">No results</li>',
        resultsList = $('#resultsList'),
        map = new google.maps.Map(document.getElementById('map'), {}),
        label,
        markers = [],
        circle = {},
        bounds,
        infoWindow = new google.maps.InfoWindow({ maxWidth: 200 });

    function addResult(result) {
        return $("<li><div class='result card bg-primary text-white rounded-0' style='width: 98%'>" +
            "<img class='card-img-top rounded-0' src='" + (result.thumbnailImg || "../images/noImage.png") +
            "'><div class='card-body  text-center p-1'><p class='card-title mb-0'>" +
            "<span class= 'font-weight-bold'>" + label + '. </span>' +
            result.title + "</p></div></div></li>").appendTo(resultsList);
    }

    go.click(function () {
        blurButton(this);
        if (input.val() !== '') {
            label = 1;
            $.getJSON('http://api.geonames.org/wikipediaSearch?&username=dovigee&type=json&callback=?',
                {
                    q: input.val(), maxRows: $('#numResults').val()
                    // , lat: circle.lat, lng: circle.lng,
                    // radius: circle.radiusKM
                }, function (data) {
                    if (!($.isEmptyObject(data.geonames))) {

                        resetAll();

                        // create li, marker, and infoWindow for each location
                        data.geonames.forEach(function (result) {

                            var lat = result.lat;
                            var lng = result.lng;
                            var location = { lat: lat, lng: lng };
                            addResult(result)
                                .click(function () {
                                    panToLocation(lat, lng, 14);
                                    openInfoWindow(result, marker);
                                });

                            // creating marker
                            var marker = new google.maps.Marker({
                                position: location,
                                label: (label++).toString(),
                                map: map,
                                title: result.title,
                            });
                            markers.push(marker);

                            // assign infoWindow to marker
                            marker.addListener('click', function () {
                                openInfoWindow(result, marker);
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
        } else {
            input.focus();
        }

    });

    $('#clear').click(function () {
        resetAll();
        resultsList.append(noResults);
        panToLocation(0, 0, 2);
        input.val(null);
        blurButton(this);
    });

    function panToLocation(lat, lng, zoom) {
        map.panTo({
            lat: lat,
            lng: lng
        });

        map.setZoom(zoom);
    }

    function openInfoWindow(result, marker) {
        infoWindow.setContent('<h6>' + result.title + '</h6>' +
            '<p>' + result.summary + '</p>' +
            '<a class="nav-link p-0" target="_blank" href="http://' +
            result.wikipediaUrl + '">Read More On Wikipedia</a>');
        infoWindow.open(map, marker);
    }

    function resetMarkers() {
        if (markers.length > 0) {
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];
        }
    }

    function resetAll() {
        resultsList.empty();

        bounds = new google.maps.LatLngBounds();

        resetMarkers();
    }

    function blurButton(button) {
        setTimeout(function () { button.blur(); }, 200);
    }

    // drawing stuff
    var drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.MARKER,
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['circle']
        },
        circleOptions: {
            fillOpacity: 0,
            strokeWeight: 1,
            clickable: false,
            editable: true,
            zIndex: 1
        }
    });
    drawingManager.setMap(map);
    google.maps.event.addListener(drawingManager, 'overlaycomplete', function (event) {
        circle.lat = event.overlay.getCenter().lat();
        circle.lng = event.overlay.getCenter().lng();
        circle.radiusKM = event.overlay.getRadius() * 1000;
        console.log(circle);
    });


    input.focus();
    resultsList.append(noResults);
    panToLocation(0, 0, 2);
}