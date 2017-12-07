/*global $*/
(function () {
    "use strict";

    var options = $("#options");


    $.get("getRecipes.php", function (loadedRecipes) {
        JSON.parse(loadedRecipes).forEach(function (element) {
            $('<option value = ' + element.id + '>' + element.name + '</option>')
                .appendTo(options);
        });
    });
    $('#recipeDisplay').hide();

    options.on('change', function () {
        $.post("getIngredients.php", { id: options.val() }, function (loadedData) {
            var result = JSON.parse(loadedData);
            var ingredients = result.name.split(',');
            // $('#recipeDisplay').append(result.image);
            // $('select').children(':selected').text().appendTo('#recipeName');
            var name = $("select option:selected").text();
            $('#recipeName').text(name);
            $('img').attr('src', result.image);

            $('#ingredients').empty();
            ingredients.forEach(function (element) {
                $('#ingredients').append('<li class="list-group-item">' + element + '</li>');
            });

            $('#recipeDisplay').show();
        }).fail(function (jqxhr) {
            alert("Error: " + jqxhr.responseText);
        });
    });
}());