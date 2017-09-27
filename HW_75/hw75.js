function isCaps(letter){
    return letter === letter.toUpperCase();
}
function isLower(letter){
    return letter !== letter.toUpperCase();
}
function mySomeFunction(arr, callback){
    for(var i = 0; i < arr.length; i++){
        if(callback(arr[i])){
            return true;
        }     
    }
    return false;
}

var myArray = ['A','d','X'];
console.log(mySomeFunction(myArray,isCaps));
console.log(mySomeFunction(myArray,isLower));

function onlyIf(arr,test,action){
    for(var i = 0; i < arr.length; i++){
        if(test(arr[i])){
            action(arr);
            break;
        }
    }
}
onlyIf(myArray,isLower,console.log);

