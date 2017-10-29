var numbers = [2,4,6];
function myMap(theArray, callback) {
    var mappedArray = [];
    theArray.forEach(function (element) {
        mappedArray.push(callback(element));
    });
    return mappedArray;
}
function double(x){
    return x * 2;
}
var mappedNumbers = myMap(numbers,double);
console.log("numbers = " , numbers);
console.log("mappedNumbers = " , mappedNumbers);
