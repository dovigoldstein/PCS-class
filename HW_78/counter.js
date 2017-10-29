var app = app || {};
app.counter = (function (counter) {
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
}(app.counter || {}));