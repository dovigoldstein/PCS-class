let args = process.argv.slice(2),
    answer = 0;

args.forEach(element => {
    answer += Number(element);
});

console.log(answer);