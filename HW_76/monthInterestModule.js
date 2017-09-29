var theMonthUtils = (function () {
    'use strict';

    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'];

    return {
        getMonthName: function (num) {
            return months[num];
        },
        getMonthNumber: function (name) {
            for (var i = 0; i < months.length; i++) {
                if (months[i] === name) {
                    return i;
                }
            }
            return "NO SUCH DAY!";
        }
    };
}());

console.log("theMonthUtils.getMonthName(6)", theMonthUtils.getMonthName(6));
console.log('theMonthUtils.getMonthNumber("June")', theMonthUtils.getMonthNumber("June"));

var interestCalculator = (function () {
    'use strict';
    var theRate;
    var theYears;
    return {
        setRate: function (rate) {
            theRate = rate;
        },
        setYears: function(years){
            theYears = years;
        },
        calculateInterest: function (principle) {
            if (typeof theRate !== 'undefined' && typeof theYears !== 'undefined') {
                var amount = principle;
                var rateToUse = theRate * 0.01;
                for(var i = 0; i < theYears; i++) {
                    amount += amount * rateToUse;
                }
                var interest = amount - principle;
                console.log('years:' , theYears);
                console.log('rate:' , theRate);
                console.log('principle:' , principle);
                console.log('amount' , amount);
                console.log('Interest' , interest);
                return interest;
            }
            console.log('Please set years and rate');
                       
        }
    };
}());


interestCalculator.setRate(10);
interestCalculator.setYears(10);
interestCalculator.calculateInterest(10);
