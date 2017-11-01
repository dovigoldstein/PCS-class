(function(){
    "use strict";
    document.getElementById('submit').addEventListener('click', function () {
        document.body.style.backgroundColor = document.getElementById('backgroundColor').value;
        document.body.style.color = document.getElementById('fontColor').value;
    });
}());