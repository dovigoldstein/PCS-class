/*global $ */
(function () {
    "use strict";

    var loadingDiv = $('<div><img src="../images/loading.gif" alt="Loading"/></div>');
    $('#submit').click(function () {
        $('#fileDisplayer').text('');
        $.get($('#fileChooser').val(), function (loadedData) {
            setTimeout(function () {
                $('#fileDisplayer').text(loadedData);
            }, 2000);
        }).fail(function (xhr, statusCode, statusText) {
            show("error: " + statusText);
            console.log(xhr, statusCode, statusText);
        });
    });

    $(document).ajaxStart(function () {
        loadingDiv.appendTo('body')
            .css({
                'left': '50%', 'right': '50%', 'position': 'absolute', 'margin-top': '50px',
                'margin-left': '-112px'
            });
    });
    $(document).ajaxStop(function () {
        setTimeout(function () {
            loadingDiv.remove();
        }, 2000);
    });

    function show(msg) {
        var messageDiv = $('<div><span>' + msg + '</span><div id="buttonDiv"><input type="button" value="OK"' +
            'id="okButton"></div></div>').appendTo('body');
        messageDiv.css({
            'background-color': 'lightblue', 'padding': '20px 20px 10px', 'width': '400px', 'height': '100px',
            'border': '1px solid blue', 'margin-left': '-200px', 'margin-top': '-50px', 'box-sizing': 'border-box',
            'display': 'inline-block', 'left': '50%', 'top': '50%', 'position': 'absolute',
        });
        $('#buttonDiv').css({ 'padding-top': '25px', 'text-align': 'center', 'width': '100%', 'margin-left': '-20px' });

        $('#okButton').click(function () {
            messageDiv.remove();
        });
    }
}());