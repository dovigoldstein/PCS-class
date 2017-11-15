alert(name);
function greaterThan( a, b){
    var answer;
    if(!isNaN(a + b)){
        answer = a > b;
    }else{
        answer = 'Please enter two numbers';
    }
    return answer;
        
}
console.log(greaterThan( 2, 1));
console.log(greaterThan( 1, 2));
console.log(greaterThan( 2, 2));
console.log(greaterThan( 'hi', 2));
console.log(greaterThan( -2, 2));

   
