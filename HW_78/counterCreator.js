var app = app || {};
app.counterCreator = (function () {
    "use strict";
    var numCounters = 0;
    return {
        getNumCounters : function (){
            return numCounters;
        },
        create : function (){
            var count = 0;
            numCounters++;
            return {
                getCount : function (){
                    return count;
                },
                increment : function (){
                    count++;
                }
            };
        }
    };
}());




