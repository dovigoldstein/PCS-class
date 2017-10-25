var account1 = {
    balance:100,
};
var account2 = {
    balance:200,
};

function addInterest(interest) {
    this.balance = this.balance + interest;
    return this.balance;
}

console.log(addInterest.call(account2,25));
console.log(addInterest.call(account2,25));
console.log(addInterest.call(account1,25));