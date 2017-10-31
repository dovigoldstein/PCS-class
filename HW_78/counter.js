var app = app || {};
app.counter = (function () {
    "use strict";
    var count = 0;
    
    return {
        getCount : function (){
            return count;
        },
        increment : function (){
            count++;
        }
    };
}());