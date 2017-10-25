var myApp = myApp || {};

myApp.utils = (function (utils) {
    "use strict";
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July','August',
    'September','October','November','December'];
    utils.getMonthName = function (num) {
        return months[num];
    };
    utils.getMonthNumber = function (name) {
        for (var i = 0; i < months.length; i++) {
            if (months[i] === name) {
                return i;
            }
        }
        return -1;
    };
    utils.stringCaseInsensitiveEquals = function (string1,string2) {
        return string1.toUpperCase() === string2.toUpperCase();
    };
    return utils;
}(myApp.utils || {}));
console.log("myApp.utils.getMonthName(6)", myApp.utils.getMonthName(6));
console.log('myApp.utils.getMonthNumber("June")', myApp.utils.getMonthNumber("June"));
console.log("myApp.utils.stringCaseInsensitiveEquals('hello','HeLLo')", myApp.utils.stringCaseInsensitiveEquals('hello','HeLLo'));