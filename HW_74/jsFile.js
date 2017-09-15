alert(name);
function greaterThan( a, b){
    if(!isNaN(a + b)){
        return a > b;
    }else{
        return 'Please enter two numbers';
    }
        
}
console.log(greaterThan( 2, 1));
console.log(greaterThan( 1, 2));
console.log(greaterThan( 2, 2));
console.log(greaterThan( 'hi', 2));
console.log(greaterThan( -2, 2));

   
